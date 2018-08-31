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
Route::get('/categories/{slug}','Guest\MainController@getProductByCategory')->name('guest.category'); 
Route::get('/products','Guest\MainController@getProduct')->name('guest.product'); 

Route::post('/Login','Guest\LoginController@postLogin')->name('guest.Login');
Route::post('/Register','Guest\LoginController@postRegister')->name('guest.Register');

Route::get('/searchProduct','Guest\MainController@getSearch')->name('guest.search');

Route::get('/searchBlog','Guest\MainController@getSearchBlog')->name('guest.searchBlog');

// Route::get('/cart','Guest\MainController@cart')->name('guest.cart');
Route::get('/cart_order/{id}','Guest\MainController@cart_order')->name('guest.cart_order');

// Cart
Route::get('/Cart/{id}','Guest\CartController@Cart_User')->name('guest.Cart_User');
Route::get('/cart','Guest\CartController@Cart')->name('guest.cart');
Route::post('/minus/{id}',['as' => 'minus', 'uses' => 'Guest\CartController@minus']);
Route::post('/plus/{id}',['as' => 'minus', 'uses' => 'Guest\CartController@plus']);
Route::get('/delete/{id}',['as' => 'delete', 'uses' => 'Guest\CartController@delete']);


Route::get('/blog','Guest\MainController@blog')->name('guest.blog');
Route::get('/blog-detail','Guest\MainController@blog_detail')->name('guest.blog_detail');
Route::get('/about','Guest\MainController@about')->name('guest.about');
Route::get('/product_detail/{id}','Guest\MainController@product_detail')->name('guest.product_detail');




// Admin
Route::get('/admin','AdminController@index')->name('admin.index');

Route::get('/delete-product/{id}','AdminController@delete')->name('admin.delete');

Route::get('/getProduct','AdminController@getProduct')->name('admin.getProduct');
Route::post('/postProduct','AdminController@addProduct')->name('admin.addProduct');

Route::get('/Edit/{id}','AdminController@getEditProduct')->name('admin.getEditProduct');
Route::post('/Edit/{id}','AdminController@postEditProduct')->name('admin.postEditProduct');

// Product Type
Route::get('/ProductType','AdminController@ProductType')->name('admin.ProductType');
Route::get('/delete-category/{id}','AdminController@delete_category')->name('admin.delete_category');

Route::get('/EditType/{id}','AdminController@getEditType')->name('admin.getEditType');
Route::post('/EditType/{id}','AdminController@postEditType')->name('admin.postEditType');

Route::get('/getProductType','AdminController@getProductType')->name('admin.getProductType');
Route::post('/postProductType','AdminController@addProductType')->name('admin.addProductType');
// User Account
Route::get('/User-Account','AdminController@User_Account')->name('admin.User_Account');
Route::get('/delete-user/{id}','AdminController@delete_user')->name('admin.delete_user');

// Route::get('/getUser_Account','AdminController@getUser_Account')->name('admin.getUser');
// Route::post('/postUser_Account','AdminController@addUser_Account')->name('admin.addUser');
Route::get('/UserCat','AdminController@User_Cat')->name('admin.UserCat');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



