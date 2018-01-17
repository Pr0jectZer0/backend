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

Route::get('/user/groups', [
    'uses' => 'GruppenController@getAllUser',
    'middleware' => 'auth.jwt'
]);

Route::get('/user/{id}', [
    'uses' => 'UserController@getById'
]);

Route::get('/user', [
    'uses' => 'UserController@getByToken',
    'middleware' => 'auth.jwt'
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

Route::get('/friend/requests', [
    'uses' => 'FreundeController@allRequests',
    'middleware' => 'auth.jwt'
]);

Route::get('/friend/{request_id}/accept', [
    'uses' => 'FreundeController@acceptRequest',
    'middleware' => 'auth.jwt'
]);

Route::get('/friend/{request_id}/decline', [
    'uses' => 'FreundeController@declineRequest',
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
    'uses' => 'ChatController@fetchPrivateMessages',
    'middleware' => 'auth.jwt'
]);

Route::post('/chatroom/{chatroom_id}/messages', [
    'uses' => 'ChatController@sendPrivateMessage',
    'middleware' => 'auth.jwt'
]);

Route::get('/groupchat/{group_id}/messages', [
    'uses' => 'ChatController@fetchGroupMessages',
    'middleware' => 'auth.jwt'
]);

Route::post('/groupchat/{group_id}/messages', [
    'uses' => 'ChatController@sendGroupMessage',
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

Route::delete('/note/{id}', [
    'uses' => 'NotizController@delete',
    'middleware' => 'auth.jwt'
]);

Route::post('/group', [
    'uses' => 'GruppenController@create',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{group_id}', [
    'uses' => 'GruppenController@get',
    'middleware' => 'auth.jwt'
]);


Route::get('/groups', [
    'uses' => 'GruppenController@getAll',
    'middleware' => 'auth.jwt'
]);

Route::post('/group/{group_id}/add_user', [
    'uses' => 'GruppenController@addUser',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{group_id}/request_access', [
    'uses' => 'GruppenController@requestAcess',
    'middleware' => 'auth.jwt'
]);

Route::post('/group/{group_id}/remove_user', [
    'uses' => 'GruppenController@removeUser',
    'middleware' => 'auth.jwt'
]);

Route::get('/user/groups/requests', [
    'uses' => 'GruppenController@allRequestsUser',
    'middleware' => 'auth.jwt'
]);

Route::get('/user/group/{group_id}/accept', [
    'uses' => 'GruppenController@acceptRequestUser',
    'middleware' => 'auth.jwt'
]);

Route::get('/user/group/{group_id}/decline', [
    'uses' => 'GruppenController@declineRequestUser',
    'middleware' => 'auth.jwt'
]);


Route::get('/group/{group_id}/requests', [
    'uses' => 'GruppenController@allRequestsGroup',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{group_id}/accept/{user_id}', [
    'uses' => 'GruppenController@acceptRequestGroup',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{group_id}/decline/{user_id}', [
    'uses' => 'GruppenController@declineRequestGroup',
    'middleware' => 'auth.jwt'
]);

Route::delete('/group/{group_id}', [
    'uses' => 'GruppenController@delete',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{group_id}/attach/note/{note_id}', [
    'uses' => 'GruppenController@attachNote',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{group_id}/detach/note/{note_id}', [
    'uses' => 'GruppenController@detachNote',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{group_id}/notes', [
    'uses' => 'GruppenController@allNotes',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{group_id}/attach/date/{date_id}', [
    'uses' => 'GruppenController@attachTermin',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{group_id}/detach/date/{date_id}', [
    'uses' => 'GruppenController@detachTermin',
    'middleware' => 'auth.jwt'
]);

Route::get('/group/{group_id}/dates', [
    'uses' => 'GruppenController@allDates',
    'middleware' => 'auth.jwt'
]);

Route::post('/date', [
    'uses' => 'TerminController@store',
    'middleware' => 'auth.jwt'
]);

Route::get('/dates', [
    'uses' => 'TerminController@getAll',
    'middleware' => 'auth.jwt'
]);

Route::get('/date/{id}', [
    'uses' => 'TerminController@get',
    'middleware' => 'auth.jwt'
]);

Route::put('/date/{id}', [
    'uses' => 'TerminController@update',
    'middleware' => 'auth.jwt'
]);

Route::delete('/date/{id}', [
    'uses' => 'TerminController@delete',
    'middleware' => 'auth.jwt'
]);