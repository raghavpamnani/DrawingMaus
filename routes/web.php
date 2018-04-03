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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::post('/mobileLogin', 'OtpController@mobileLogin');

Route::get('/OTPverification', function (){
	return view('auth.otp');
});  
Route::post('/loginWithOtp', 'OtpController@loginWithOtp'); 

Route::post('/validateregister', 'ParticipantController@store'); 
//Route::resource('participant','ParticipantController');

// for pdf file download
Route::get('/index','ParticipantController@index');
Route::get('/downloadPDF/{id}','ParticipantController@downloadPDF');

// To Edit/destroy/update data of participant
Route::get('/edit/{id}','ParticipantController@edit');
Route::get('/destroy/{id}','ParticipantController@destroy');
Route::post('/updateCanditate/{id}','ParticipantController@updateCanditate');
Route::post('/upload/{id}','ParticipantController@upload');
Route::get('/form','ParticipantController@form');

// To Change Password 
Route::get('/profile','SettingController@showChangePasswordForm') ;
Route::post('/changePassword','SettingController@changePassword')->name('changePassword');

//For Setting profile 
Route::get('/setting','SettingController@index');
Route::post('/editProfile','SettingController@updateProfile');



