<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;


Route::get('', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::prefix('admin')->namespace('Admin')->middleware(['admin', 'prevent-back-history'])->group(function () {
   
    Route::get('/dashboard', 'AdminDashboardController@index');
    Route::get('admin_users/{user_id}/set-password', 'AdminUserController@setPassword');
    Route::post('admin_users/{user_id}/set-password', 'AdminUserController@newPassword');
    Route::resource('/admin_users/{id}/manage', 'AdminUserManageController');
    Route::post('/admin_users/bulk-delete', 'AdminUserController@bulkDelete');
    Route::resource('/admin_users', 'AdminUserController');
  
    Route::post('/order_requests/bulk-delete', 'OrderController@bulkDelete');
    Route::post('/customer_support/bulk-delete', 'CustomerSupportController@bulkDelete');

    Route::resource('/order_requests', 'OrderController');
    Route::resource('/customer_support', 'CustomerSupportController');

    Route::resource('/user/profile', 'ProfileController');

});


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
///////////USER REGISTRATION SET NEW PASSWORD/////////
Route::get('create-new-password/{token}/pass', 'Auth\ResetPasswordController@createPassword');
Route::post('create-new-password/{token}/pass', 'Auth\ResetPasswordController@newPassword');

// Confirm Password (added in v6.2)
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify'); // v6.x
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('unauthorized', 'LocationController@error_auth_user');
//Route::get('/authenticate/twofactor', 'Auth\LoginController@two_factor');
Route::get('/authenticate/two_factor_auth/{token}/otp_verify', 'Auth\LoginController@two_factor');
Route::post('/authenticate/two_factor_auth/{token}/otp_verify', 'Auth\LoginController@two_factor_auth');
Route::post('/authenticate/resend_otp', 'Auth\LoginController@resend_otp');

Route::get('set_side_bar_cookie', 'LocationController@setSession');

Route::get('coming_soon', 'Console\DashboardController@coming_soon');
Route::post('experiment/experiment_units/stream-add-more', 'Console\Experiment\ExperimentUnit\ExperimentController@streamAddMore');
Route::post('experiment/experiment_units/clone', 'Console\Experiment\ExperimentUnit\ExperimentController@cloneExpUnit');
Route::get('/custome_error', function () {
    return view('pages.error.cusome_error');
});



