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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// Route::get('/', function () {
//     return view('house_main');
// });
Route::get('/', 'HomeController@index')->name('home');
Route::get('/house/register','RegistController@houseRegister')->name('house.register');
Route::get('/guest/register','RegistController@guestRegister')->name('guest.register');
Route::get('/house/mypage','HomeController@getMypage')->name('house.mypage');
Route::get('/house/entry','HomeController@getEntry')->name('house.entry');
Route::resource('/house', 'HouseController');
//Route::get('/house/main','DisplayController@index')->name('house.main');

//パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');