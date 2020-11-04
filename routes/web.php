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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['middleware' => 'auth'], function () {
    Route::get('otp', 'OtpController@showOtpForm')->name('otp.show');
    Route::post('otp', 'OtpController@postOtp')->name('otp.check');

    Route::group(['middleware' => 'otp'], function () {
        Route::get('/', 'HomeController@index')->name('home');
    });
});