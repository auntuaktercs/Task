<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'IndexController@index')->name('index');

    Route::get('/show-login', 'FrontendController@show_login')->name('login');
    Route::post('/login', 'UserController@login')->name('admin.login');
    Route::get('/logout', 'UserController@logout')->name('logout');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Backend'], function () {

    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('/coming', 'DashboardController@coming')->name('coming');

    /*
    |--------------------------------------------------------------------------
    | User Management Route Starts
    |--------------------------------------------------------------------------
    */
    Route::resource('users', 'UserController');
    /*--------------------------------------------------------------------------
    | User Management Route Ends
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Password Update Route Starts
    |--------------------------------------------------------------------------
    */
    Route::get('/password-update/{id}', 'UpdatePasswordController@edit_password')->name('user.password');
    Route::post('/current-pwd', 'UpdatePasswordController@checkCurrentPwd')->name('current_pwd');
    Route::post('/update-password', 'UpdatePasswordController@updateCurrentPwd')->name('new_pwd');
    /*
    |--------------------------------------------------------------------------
    | Password Update Route Ends
    |--------------------------------------------------------------------------
    */
});
