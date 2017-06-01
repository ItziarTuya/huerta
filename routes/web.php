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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'WelcomeController@index')->name('welcome');


/* -- Producer -- */
Route::group(['namespace' => 'Producer', 'prefix' => 'producer'], function () {
	Route::get('/register', 'RegisterController@showRegistrationForm')->name('producer.register');
	Route::post('/register', 'RegisterController@register')->name('producer.register');
	Route::get('/index', 'ProfileController@index');
	Route::get('/edit', 'ProfileController@edit');
	Route::post('/edit', 'ProfileController@update');


    Route::resource('products', 'ProductController', ['names' =>
        ['index' => 'producer.products',
        'create' => 'producer.product.create',
        'store' => 'producer.product.store',]
    ]);
});



/* -- Customer -- */
Route::group(['namespace' => 'Customer', 'prefix' => 'customer'], function () {
	Route::get('/index', 'ProfileController@index');
	Route::get('/edit', 'ProfileController@edit');
});
