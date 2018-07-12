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
Route::get('/tweets/create', 'TweetsController@create');
Route::get('/tweets/{tweet}', 'TweetsController@show');
Route::post('/tweets', 'TweetsController@store');
Route::get('/tweets/{tweet}/edit', 'TweetsController@edit');
Route::patch('/tweets/{tweet}', 'TweetsController@update');
Route::delete('/tweets/{tweet}', 'TweetsController@destroy');
Route::post('/tweets/{tweet}/comments', 'CommentsController@store');
Route::delete('/tweets/{tweet}/comments/{comment}', 'CommentsController@destroy');


