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

Route::get('/chatroom/{user_id}', [
    'uses' => 'ChatController@getPrivateChatRoom',
    'middleware' => 'auth.jwt'
]);

Route::get('/chatroom/{chatroom_id}/messages', [
    'uses' => 'ChatController@fetchMessages',
    'middleware' => 'auth.jwt'
]);

Route::post('/chatroom/{chatroom_id}/messages', [
    'uses' => 'ChatController@sendMessage',
    'middleware' => 'auth.jwt'
]);

Route::post('/note', [
    'uses' => 'NotizController@store',
    'middleware' => 'auth.jwt'
]);

Route::get('/notes', [
    'uses' => 'NotizController@getAll',
    'middleware' => 'auth.jwt'
]);

Route::get('/note/{id}', [
    'uses' => 'NotizController@get',
    'middleware' => 'auth.jwt'
]);

Route::put('/note/{id}', [
    'uses' => 'NotizController@update',
    'middleware' => 'auth.jwt'
]);

Route::delete('/user/{id}', [
    'uses' => 'NotizController@delete',
    'middleware' => 'auth.jwt'
]);

Route::post('/group', [
    'uses' => 'GruppenController@create',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{id}', [
    'uses' => 'GruppenController@get',
    'middleware' => 'auth.jwt'
]);

Route::post('/group/{id}/add_user', [
    'uses' => 'GruppenController@addUser',
    'middleware' => 'auth.jwt'
]);

Route::post('/group/{id}/remove_user', [
    'uses' => 'GruppenController@removeUser',
    'middleware' => 'auth.jwt'
]);

Route::get('/groups/requests', [
    'uses' => 'GruppenController@allRequests',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{id}/accept', [
    'uses' => 'GruppenController@acceptRequest',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{id}/decline', [
    'uses' => 'GruppenController@declineRequest',
    'middleware' => 'auth.jwt'
]);

Route::get('/groups', [
    'uses' => 'GruppenController@getAll',
    'middleware' => 'auth.jwt'
]);

Route::delete('/group/{id}', [
    'uses' => 'GruppenController@delete',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{group_id}/attach/note/{note_id}', [
    'uses' => 'GruppenController@attachNote',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{group_id}/notes', [
    'uses' => 'GruppenController@allNotes',
    'middleware' => 'auth.jwt'
]);