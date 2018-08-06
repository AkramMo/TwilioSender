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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('sendSms', 'SenderController@sendSms')->name('sendSms');
Route::post('form-validation', 'SenderController@formValidationPost')->name('form-validation');

// View Sender
Route::get('/sender', 'SenderController@senderView')->name('sender');
