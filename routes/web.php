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

Route::get('/','HomeController@Index');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


Route::post('/phone/uploadimage','PhoneController@uploadimage')->name('phone.uploadimage');
Route::get('phone/pdf','PhoneController@pdf');


Route::resource('brand','PhoneBrandsController');
Route::resource('phone','PhoneController');


Route::get('/phone/test',function(){
    return view ('phone.test');
});
Route::get('/test1',function(){
    return view ('phone.test1');
});