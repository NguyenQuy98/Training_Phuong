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

Route::get('/','Guest\MainController@main')->name('guest.home');
Route::get('/contact',['as' => 'guest.contact','uses' => 'Guest\MainController@contact']);
Route::get('/product','Guest\MainController@product')->name('guest.product');