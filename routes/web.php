<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('home');
});

Route::group(['middleware' => ['web']], function() {

    // Login Routes...
        Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
        Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
        Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    
    // Registration Routes...
        // Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    
    // Password Reset Routes...
        // Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
        // Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
        // Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
        // Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('sendSms', 'SenderController@sendSms')->name('sendSms');


Route::group([
    'middleware' => 'auth'
], function ($router) {
    Route::post('sender', 'SenderController@formValidationPost')->name('form-validation');
    // View Sender
    Route::get('sender', 'SenderController@senderView')->name('sender');
});