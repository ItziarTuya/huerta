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

Route::group(['namespace' => 'Producer', 'prefix' => 'producer'], function () {
	Route::get('/register', 'RegisterController@showRegistrationForm')->name('producer.register');
	Route::post('/register', 'RegisterController@register')->name('producer.register');
	Route::get('/profile', 'ProfileController@index')->name('producer.profile');

	Route::get('/products', 'ProductController@index')->name('producer.products');
	Route::get('/product/create', 'ProductController@create')->name('producer.product.create');
	Route::post('/product/create', 'ProductController@store')->name('producer.product.store');
});
