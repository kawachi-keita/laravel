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


Auth::routes();
Route::get('/house/register','RegistController@houseRegister')->name('house.register');
Route::get('/guest/register','RegistController@guestRegister')->name('guest.register');
Route::get('/admin/login','AdminController@login')->name('admin.login'); 
Route::group(['middleware' => ['auth']], function () {
Route::get('/', 'HomeController@index')->name('home');
Route::get('/house/mypage','HomeController@getMypage')->name('house.mypage');
Route::post('/house/conf','HouseController@getConf')->name('house.conf'); //物件新規登録確認用
Route::post('/house/search','GuestController@search')->name('house.search');

Route::get('/house/favorite','HomeController@getFavorite')->name('house.favorite');
Route::get('/guest/favorite','HomeController@getFavorite')->name('guest.favorite');

Route::get('/post/create/{houseId}','PostController@create')->name('post.create');
Route::post('/post/conf','PostController@conf')->name('post.conf'); 
Route::post('/post/complete','PostController@complete')->name('post.complete'); 


Route::get('/admin','AdminController@index'); 
Route::get('/admin/searchHouse','AdminController@searchHouse')->name('admin.searchHouse'); 
Route::post('/admin/searchHouse','AdminController@adminSearchHouse')->name('admin.searchHouse'); 
Route::get('/admin/searchUser','AdminController@searchUser')->name('admin.searchUser'); 
Route::post('/admin/searchUser','AdminController@adminSearchUser')->name('admin.searchUser'); 

Route::resource('house', 'HouseController');
Route::resource('guest', 'GuestController');
Route::resource('user', 'UsersController');
//「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
Route::post('ajaxlike', 'LikeController@ajaxlike')->name('ajaxlike');
});
//パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');