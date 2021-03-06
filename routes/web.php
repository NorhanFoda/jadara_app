<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){

    // dd('1');
    redirect()->route('admin.home');
});

Route::get('admin', function(){

    dd('2');
    redirect()->route('admin.login');
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    session(['lang' => \App::getLocale()]);
	// Admin Auth
    Route::get('admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'Admin\Auth\LoginController@login');
    Route::post('admin-password/email', 'Admin\Auth\ForgotPasswordController@sendResetSendEmail')->name('admin.password.email');
    Route::get('admin-password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('admin-password/reset', 'Admin\Auth\ResetPasswordController@reset');
    Route::get('admin-password/reset/{email}', 'Admin\Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('admin-password/update', 'Admin\Auth\ResetPasswordController@update')->name('admin.password.update');

    Route::group(['prefix' => 'admin/', 'middleware' => 'auth'], function(){

        // Home page
        Route::get('home', 'Admin\HomeController@index')->name('admin.home');
        Route::put('update_settings', 'Admin\HomeController@update')->name('settings.update');
        Route::post('delete_contact', 'Admin\HomeController@deleteContact')->name('contacts.delete');

        // Additional links
        Route::resource('links', 'Admin\LinkController');
        Route::post('delete_link', 'Admin\LinkController@deleteLink')->name('links.delete');

        // Users
        Route::resource('users', 'Admin\UsersController');

        // Notifications
        Route::get('get_notifications', 'Admin\NotificationController@index')->name('notifications.index');
        Route::get('notifications', 'Admin\NotificationController@create')->name('notifications.create');
        Route::post('notifications', 'Admin\NotificationController@store')->name('notifications.store');
        Route::post('/notifications_delete', 'Admin\NotificationController@delete')->name('notifications.delete');
        
        // Change lang
        Route::get('change_locale/{locale}', 'Admin\HomeController@change_locale')->name('change_locale');

        // Users
        Route::resource('users', 'Admin\UsersController');
    });    
});

/** Set default language to Arabic **/
Route::get('/admin/', function () {
    \LaravelLocalization::setLocale('ar');
    $url = \LaravelLocalization::getLocalizedURL(\App::getLocale(), \URL::previous());
        session(['lang' => \App::getLocale()]);
        return Redirect::to($url);
});

Auth::routes();
