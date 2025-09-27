<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\HomepageSettingController;
use App\Http\Controllers\Admin\Localization\BackendLanguageController;
use App\Http\Controllers\Admin\Localization\ChangeLanguageController;
use App\Http\Controllers\Admin\Localization\LanguageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\Role\RoleAndPermissionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\Settings\MaintenanceModeController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\User\UserController;
use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::controller(AdminAuthController::class)->group(function () {
        Route::post('/forget-password', 'forgetPassword')->name('forget_password');
        Route::get('/reset-password', 'resetPasswordIndex')->name('reset_password');
        Route::post('/reset-password', 'resetPasswordUpdate')->name('reset_password');
    });
    Route::controller(AdminLoginController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'handleLogin')->name('login');
        Route::get('/logout', 'handleLogout')->name('logout');
        Route::get('/dashboard', 'index')->name('index')->middleware('admin', 'adminStatusCheck');
        Route::get('/admin-profile', 'adminProfile')->name('profile')->middleware('admin', 'adminStatusCheck');
        Route::post('/update-basic-info', 'updateBasicInfo')->name('basicInfo')->middleware('admin', 'adminStatusCheck');
        Route::post('/update-password', 'updatePassword')->name('update_basic_info')->middleware('admin', 'adminStatusCheck');
    });

    Route::middleware('admin', 'adminStatusCheck')->group(function () {
        //user routes
        Route::resource('user', UserController::class)->except(['craete', 'show']);
        Route::controller(UserController::class)->name('user.')->prefix('user')->group(function () {
            Route::get('/update/status/{id}/{status}', 'updateStatus')->name('user_status');
        });

        //roles and permissions
        Route::resource('role', RoleAndPermissionController::class)->except(['craete', 'show']);
        Route::controller(RoleAndPermissionController::class)->name('role.')->prefix('role')->group(function () {
            Route::get('/get-user-permissions/{id}', 'getUserPermission')->name('getUserPermission');
            Route::post('/give-user-permissions', 'giveUserPermission')->name('giveUserPermission');
        });

        //language controller
        Route::resource('language', LanguageController::class)->except(['craete', 'show']);
        Route::controller(LanguageController::class)->name('language.')->prefix('language')->group(function () {
            Route::get('/update/status/{id}/{status}', 'updateStatus')->name('language_status');
        });

        //backend language controller
        Route::resource('backend/language', BackendLanguageController::class, ['as' => 'backend'])->except(['craete', 'show', 'edit', 'distroy']);
        Route::controller(BackendLanguageController::class)->name('backend.language.')->prefix('backend/language')->group(function () {
            Route::post('/store/translate/string', 'storeTranslateString')->name('storeTranslateString');
            Route::post('/store/apikey', 'storeApikey')->name('storeApikey');
        });
        Route::get('/change/language/{lang}', ChangeLanguageController::class)->name('changeLanguage');

        //settings
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/maintenance-mode', [MaintenanceModeController::class, 'maintenanceMode'])->name('server.maintenanceMode');
            Route::post('/maintenance-mode-on', [MaintenanceModeController::class, 'maintenanceModeOn'])->name('server.maintenanceModeOn');
            // Route::get('/server/down',[MaintenanceModeController::class,'down'])->name('server.down');
            Route::get('/server/up', [MaintenanceModeController::class, 'up'])->name('server.up');
            Route::get('/secret-code/delete/{id}', [MaintenanceModeController::class, 'destroy'])->name('secret-code.delete');
            Route::get('/secret-code/delete-all', [MaintenanceModeController::class, 'destroyAll'])->name('secret-code.delete-all');
        });
        Route::prefix('pages')->name('pages.')->group(function () {
            Route::controller(HomepageSettingController::class)->prefix('homepage')->name('homepage.')->group(function () {
                Route::get('/main-slider', 'mainSlider')->name('main_slider');
                Route::post('/main-slider', 'mainSliderStore')->name('main_slider_store');
                Route::get('/main-slider-delete/{id}', 'mainSliderDelete')->name('main_slider_delete');
                Route::get('/slider/update/status/{id}/{status}', 'updateSliderStatus');
                Route::get('/slider/{id}/edit', 'edit');
                Route::put('/slider/{id}', 'update');
                Route::delete('/slider/{id}', 'destroySlider');

                /** Other Route of Homepage */
                Route::get('/other-contents', 'otherContent')->name('otherContent');
                Route::post('/update-counter', 'updateCounter')->name('updateCounter');
                Route::post('/update-aboutus', 'updateAboutus')->name('updateAboutus');
            });
            Route::controller(AboutUsController::class)->prefix('about-us')->group(function () {
                Route::get('/update/about-us', 'aboutUs')->name('aboutUs');
                Route::post('/update/about-us', 'updateAboutUs')->name('updateAboutUs');
            });

            Route::controller(ContactUsController::class)->prefix('contact-us')->group(function () {
                Route::get('/update/contact-us', 'contactUs')->name('contactUs');
                Route::post('/update/contact-us', 'updateContactUs')->name('updateContactUs');
                Route::get('/messages', 'contactUsMessages')->name('contactUsMessages');
            });

            /** Service Start */
            Route::resource('service', ServiceController::class)->except('create', 'show');
            Route::controller(ServiceController::class)->prefix('service')->group(function () {
                Route::get('/update/status/{id}/{status}', 'updateStatus');
            });
            /** Service End */

            /** Team Start */
            Route::resource('team', TeamController::class)->except('create', 'show');
            Route::controller(TeamController::class)->prefix('team')->group(function () {
                Route::get('/update/status/{id}/{status}', 'updateStatus');
            });
            /** Team End */

            /** Project Start */
            Route::resource('project', ProjectController::class)->except('create', 'show');
            Route::controller(ProjectController::class)->prefix('project')->group(function () {
                Route::get('/update/status/{id}/{status}', 'updateStatus');
            });
            /** Project End */
        });
    });

    Route::get('/translate-string',function(){
        $data = [];
        $langs = getLangs();
        foreach($langs as $lang){
            $darr =  GoogleTranslate::trans(request()->tdata, $lang->lang, 'en');
            array_push($data,$darr);
        }
        return [
            'tdata'=>$data,
            'langs'=>$langs
        ];
    })->name('translateString');
});
