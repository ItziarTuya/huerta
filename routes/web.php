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

/* -- General -- */
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('error/forbidden', function () { return view('errors.forbidden'); });

/* -- Producer -- */
Route::group(['namespace' => 'Producer', 'prefix' => 'producer'], function () {
    /* -- Profile -- */
	Route::get('/register', 'RegisterController@showRegistrationForm')->name('producer.register');
	Route::post('/register', 'RegisterController@register')->name('producer.register');
	Route::get('/edit', 'ProfileController@edit');
    Route::post('/edit', 'ProfileController@update');

    /* -- Product -- */
	Route::get('/sales', 'ProductController@sales');
    Route::resource('products', 'ProductController', ['names' =>
        ['index' => 'producer.products',
        'create' => 'producer.product.create',
        'store' => 'producer.product.store',]
    ]);
});

/* -- User -- */
Route::group(['namespace' => 'User', 'prefix' => 'user'], function () {
	Route::get('/edit', 'ProfileController@edit');
	Route::post('/edit', 'ProfileController@update');
});

/* -- Admin -- */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/products', 'ProductController@index');
    Route::get('/users', 'UserController@index');
    Route::get('/users/{user}/edit', 'UserController@edit');
    Route::post('/users/{user}/edit', 'UserController@update');
    Route::delete('/users/{user}', 'UserController@destroy');
    Route::get('/shoppingcarts', 'ShoppingCartController@index');
    Route::put('/products/{id}', 'ProductController@restore');
    Route::put('/users/{id}', 'UserController@restore');
});

/* -- Shop -- */
Route::group(['namespace' => 'Shop', 'prefix' => 'shop'], function () {
    /* -- Products -- */
    Route::get('/index', 'ProductController@index');
    Route::get('/category/{category}', 'ProductController@category');
    Route::get('/show/{product}', 'ProductController@show');
    Route::post('/add/{product}', 'ProductController@add');

    /* -- Products -- */
    Route::get('/cart/{shoppingCart}', 'ShoppingCartController@index');
    Route::get('/cart/confirm/{shoppingCart}', 'ShoppingCartController@confirm');
    Route::delete('/cart/clear/{shoppingCart}', 'ShoppingCartController@clear');
    Route::delete('/cart/{shoppingCart}/item/{buyItem}', 'ShoppingCartController@subtract');
    Route::post('/cart/checkout/{shoppingCart}', 'ShoppingCartController@checkout');
});


/* -- Customer -- */
Route::get('customer/orders', 'Customer\ShoppingCartController@orders')->name('orders');