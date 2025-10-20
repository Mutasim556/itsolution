<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Admin\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Mews\Purifier\Facades\Purifier;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('frontend.auth.loginregister');
    }

    public function attemptLogin(Request $data)
    {
        $prev = session()->get('prev_url') == $data->page_url ? url('/') : session()->get('prev_url');
        $data->validate([
            'user_phone' => 'required',
            'password' => 'required',
        ], [
            'user_phone.required' => __('admin_local.Phone is Required'),
            'password.required' => __('admin_local.Password is Required'),
        ]);
        $credential = [
            'phone' => $data->user_phone,
            'password' => $data->password,
        ];
        if (Auth::attempt($credential)) {
            return redirect($prev ?? url('/'));
        } else {
            return back()->with(['message' => __('admin_local.Phone or Password Doesnt Match')]);
        }
    }

    public function register(Request $data)
    {
        $data->validate([
            'user_name' => 'required',
            'user_phone' => 'required|unique:users,phone',
            'user_email' => 'unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'user_name.required' => __('admin_local.User name required'),
            'user_phone.required' => __('admin_local.Phone number required'),
            'user_phone.unique' => __('admin_local.Phone number already taken'),
            'user_email.unique' => __('admin_local.Email already taken'),
            'password.required' => __('admin_local.Password required'),
            'password.min' => __('admin_local.Password length should be at least 8'),
            'password.confirmed' => __('admin_local.Password does not match'),
        ]);

        $user = User::create([
            'phone'    => $data->user_phone,
            'name'     => $data->user_name,
            'username'     => \Str::slug($data->user_name) . rand(10000, 99999),
            'email'    => $data->user_email,
            'address'  => $data->user_address,
            'password' => Hash::make($data->password),
        ]);

        $credential = [
            'phone' => $data->user_phone,
            'password' => $data->password,
        ];
        if (Auth::attempt($credential)) {
            return redirect('/');
        }
    }

    public function attemptLogout()
    {
        Auth::logout();
        return redirect()->back();
    }


    public function changePassword(Request $data)
    {
        $data->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();
        if (!Hash::check($data->current_password, $user->password)) {
            return back()->withErrors(['current_password' => __('Current password is incorrect.')]);
        }
        $user->password = Hash::make($data->new_password);
        $user->save();

        return back()->with('success', __('Password changed successfully!'));
    }


    public function forgetPassword()
    {
        return view('frontend.auth.forgetpassword');
    }

    public function forgetPasswordLink(Request $data)
    {
        $data->validate([
            'email' => 'required|email',
        ]);
        $user = User::where([['delete', 0], ['status', 1], ['email', $data->email]])->first();
        if (!$user) {
            return back()->withErrors(['email' => 'No user found with this email address.']);
        }

        // Check last token
        $recent = DB::table('password_reset_tokens')
            ->where('email', $user->email)
            ->orderBy('created_at', 'desc')
            ->first();
        $throttleMinutes = 1;
        if ($recent) {
            $expiresAt = Carbon::parse($recent->created_at)->addMinutes($throttleMinutes);
            $now = Carbon::now();

            if ($expiresAt->isFuture()) {
                $remaining = ceil(Carbon::parse($recent->created_at)
                    ->addMinutes($throttleMinutes)
                    ->diffInMinutes(Carbon::now()));
                return back()->with([
                    'error' => "A password reset email was already sent. Please wait {$remaining} minute(s) before requesting again."
                ])->withInput();
            }
        }

        // Generate new token
        $token = \Str::random(60);

        // Save token
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            [
                'token' => Hash::make($token),
                'created_at' => now()
            ]
        );

        // Email data
        $data_mail = [
            'name' => $user->name,
            'email' => $user->email,
            'reset_link' => url('/user/reset-password?token=' . $token . '&email=' . urlencode($user->email)),
        ];

        // Send email
        Mail::send(['html' => 'frontend.auth.mail.forgetpasswordmail'], $data_mail, function ($message) use ($data_mail) {
            $message->to($data_mail['email'], $data_mail['name'])
                ->subject("Password Reset Mail - " . env('APP_FRONTEND_NAME', 'TEST'))
                ->from('mis@inceptapharma.com', 'MIS');
        });

        return back()->with('status', 'Password reset email sent successfully! It will expire in 15 minutes.');
    }


    public function resetPassword()
    {
        $email = request()->email;
        $token = request()->token;
        $record = DB::table('password_reset_tokens')
            ->where('email', $email)
            ->first();

        if (!$record) {
            return to_route('user.forgetPassword')->withErrors([
                'email' => "Invalid or expired password reset link for {$email}."
            ])->withInput();
        }
        $expiresAt = Carbon::parse($record->created_at)->addMinutes(155);
        if ($expiresAt->isPast()) {
            return to_route('user.forgetPassword')->withErrors([
                'email' => "This password reset link has expired for {$email}. Please request a new one."
            ])->withInput();
        }
        return view('frontend.auth.resetpassword', compact('email', 'token'));
    }

    public function resetChangePassword(Request $data)
    {
        $data->validate([
            'password' => 'required|confirmed',
        ]);

        $record = DB::table('password_reset_tokens')
            ->where('email', $data->email)
            ->first();

        if (!$record) {
            return back()->withErrors([
                'email' => "Invalid or expired password reset link for {$data->email}."
            ])->withInput();
        }

        // 3️⃣ Check if token is still valid (15 minutes)
        $expiresAt = Carbon::parse($record->created_at)->addMinutes(1);
        if ($expiresAt->isPast()) {
            return back()->withErrors([
                'email' => "This password reset link has expired for {$data->email}. Please request a new one."
            ])->withInput();
        }

        // 4️⃣ Verify token
        if (!Hash::check($data->token, $record->token)) {
            return back()->withErrors([
                'token' => "Invalid token for {$data->email}."
            ])->withInput();
        }

        // 5️⃣ Update user password
        $user = User::where('email', $data->email)->first();
        if (!$user) {
            return back()->withErrors([
                'email' => "User not found for {$data->email}."
            ])->withInput();
        }

        $user->password = Hash::make($data->password);
        $user->setRememberToken(\Str::random(60));
        $user->save();

        // 6️⃣ Delete password reset record to prevent reuse
        DB::table('password_resets')->where('email', $data->email)->delete();

        // 7️⃣ Redirect to login with success message
        return redirect()->route('login')->with('status', "Your password has been successfully reset! You can now log in.");
    }
}
