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