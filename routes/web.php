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

Route::get('/producer/register', 'RegisterProducerController@showRegistrationForm');
Route::post('/producer/register', 'RegisterProducerController@register')->name('producerRegister');
Route::get('/producer/index', 'ProfileProducerController@index');
