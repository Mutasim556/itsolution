<?php

use App\Http\Controllers\FrontEnd\AuthController;
use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\FrontEnd\UserProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('frontLang')->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::controller(FrontEndController::class)->name('frontEnd.')->group(function () {
        Route::get('/about-us', 'aboutUs')->name('aboutUs');

        Route::get('/services', 'services')->name('services');
        Route::get('/service-details/{slug}', 'serviceDetails')->name('serviceDetails');

        Route::get('/projects', 'projects')->name('projects');
        Route::get('/project-details/{slug}', 'projectDetails')->name('projectDetails');

        Route::get('/team-members', 'teamMembers')->name('teamMembers');
        Route::get('/team-member-details/{slug}', 'teamMemberDetails')->name('teamMemberDetails');

        Route::get('/contact-us', 'contactUs')->name('contactUs');
        Route::post('/contact-us', 'contactUsStore')->name('contactUsStore')->middleware('throttle:3,1');

        Route::get('/brands', 'brands')->name('brands');
        Route::get('/public-diplomacy', 'publicDiplomacy')->name('publicDiplomacy');
        Route::get('/public-diplomacy/load-more', 'loadMore')->name('loadMore');

        Route::get('/blogs', 'blogs')->name('blogs');
        Route::get('/blogs/load-more', 'blogLoadMore')->name('blogLoadMore');
        Route::get('/blog-details/{slug}', 'blogDetails')->name('blogDetails');
    });
    Route::get('/change-front-lang/{lang}', function () {
        try {
            Cookie::queue('front_language', request()->lang, 10);
            return back();
        } catch (\Throwable $th) {
            Cookie::queue('front_language', 'en', 10);
            return back();
        }
    })->name('changeFrontLang');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';


    Route::get('module', function () {
        return config('modules');
    });

    Route::get('modulec', function () {
        $test = config('modules');
        $tt = '';
        $true = true;
        $false = false;
        $content = "
        'status'=>$true,
        'route'=>'modules/subscription/routes/web.php',
    ";
        if (config('modules')) {
            foreach (config('modules') as $key => $val) {
                if ($key == 'subscription') {
                    break;
                    return 'already exist';
                }
                if (is_array($val)) {
                    $zz = '';
                    foreach ($val as $dkey => $dd) {
                        if (is_int($dd)) {
                            $zz = $zz . "        '$dkey'=>$dd,\n";
                        } else {
                            $zz = $zz . "        '$dkey'=>'$dd',\n";
                        }
                    }
                }

                $tt = $tt . "\n    '$key'=>[\n$zz\n    ],";
            }
        }

        $tt = $tt . "\n    'subscription'=>[       $content],";
        $phpArray = "<?php\n\nreturn [  $tt \n];";
        file_put_contents(config_path('modules.php'), $phpArray);
        echo $phpArray;
    });



    //auth routes

    Route::controller(AuthController::class)->prefix('user')->name('user.')->group(function(){
        Route::get('/login-register','loginIndex')->name('loginIndex')->middleware('guest');
        Route::post('/login','attemptLogin')->name('attemptLogin')->middleware('guest');
        Route::get('/logout','attemptLogout')->name('attemptLogout')->middleware('auth');
        Route::post('/register','register')->name('register')->middleware('guest');
        Route::post('/change-password','changePassword')->name('changePassword')->middleware('auth');

        /** Forget Password Start */
        Route::get('/forget-password','forgetPassword')->name('forgetPassword')->middleware('guest');
        Route::post('/forget-password','forgetPasswordLink')->name('forgetPasswordLink')->middleware('guest');
        Route::get('/reset-password','resetPassword')->name('resetPassword')->middleware('guest');
        Route::post('/reset-change-password','resetChangePassword')->name('resetChangePassword')->middleware('guest');
        /** Forget Password End */
    });

    Route::controller(UserProfileController::class)->prefix('user')->name('user.')->middleware('auth')->group(function(){
        Route::get('/profile','userProfile')->name('userProfile');
        Route::get('/get-work-updates/{id?}','getWorkUpdates')->name('getWorkUpdates');
        Route::get('/get-work-payments/{id?}','getWorkPayments')->name('getWorkPayments');
        Route::put('/updates-feedback/{id?}','updatesFeedback')->name('updatesFeedback');
    });
});
