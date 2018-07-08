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

Route::get('/', 'TweetsController@index');
Route::get('/tweets/{id}', 'TweetsController@show')->where('id', '[0-9]+');
Route::get('/tweets/create', 'TweetsController@create');
Route::post('/tweets', 'TweetsController@store');


