<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Admin\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    
}
