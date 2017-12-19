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

Route::get('/users', [
    'uses' => 'UserController@getAll'
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

Route::get('/friends', [
    'uses' => 'FreundeController@getAll',
    'middleware' => 'auth.jwt'
]);

Route::post('/friend/add', [
    'uses' => 'FreundeController@addFriend',
    'middleware' => 'auth.jwt'
]);

Route::delete('/friend/remove/{id}', [
    'uses' => 'FreundeController@removeFriend',
    'middleware' => 'auth.jwt'
]);

Route::post('/game', [
    'uses' => 'SpieleController@store'
]);

Route::get('/games', [
    'uses' => 'SpieleController@getAll'
]);

Route::get('/game/{id}', [
    'uses' => 'SpieleController@get'
]);

Route::put('/game/{id}', [
    'uses' => 'SpieleController@update',
]);

Route::delete('/game/{id}', [
    'uses' => 'SpieleController@delete',
]);

Route::get('/publisher', [
    'uses' => 'SpieleController@getPublisher'
]);

Route::get('/genre', [
    'uses' => 'SpieleController@getGenre'
]);


Route::post('/user/game/add', [
    'uses' => 'UserController@addGame',
    'middleware' => 'auth.jwt'
]);

Route::delete('/user/game/remove/{id}', [
    'uses' => 'UserController@removeGame',
    'middleware' => 'auth.jwt'
]);

Route::get('/user/game/list', [
    'uses' => 'UserController@showGames',
    'middleware' => 'auth.jwt'
]);

Route::get('messages/{id}', [
    'uses' =>  'ChatController@fetchMessages',
    'middleware' => 'auth.jwt'
]);

Route::post('messages/{id}', [
    'uses' =>  'ChatController@sendMessage',
    'middleware' => 'auth.jwt'
]);

