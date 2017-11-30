<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/user/login', [
    'uses' => 'AuthController@login'
]);

Route::post('/user', [
    'uses' => 'UserController@store'
]);

Route::get('/user/{id}', [
    'uses' => 'UserController@get'
]);

Route::put('/user/{id}', [
    'uses' => 'UserController@update',
    'middleware' => 'auth.jwt'
]);

Route::delete('/user/{id}', [
    'uses' => 'UserController@delete',
    'middleware' => 'auth.jwt'
]);