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

Route::post('/user', 'UserController@store');
Route::post('/user/login', 'AuthController@login');


Route::middleware(['auth.jwt'])->group(function () {

    /*
     * User Routes
    */
    Route::post('/user/game/add', 'UserController@addGame');

    Route::get('/user', 'UserController@getByToken');
    Route::get('/users', 'UserController@getAll');
    Route::get('/user/game/list', 'UserController@showGames');
    Route::get('/user/groups', 'GruppenController@getAllUser');
    Route::get('/user/groups/requests', 'GruppenController@allRequestsUser');
    Route::get('/user/group/{group_id}/accept', 'GruppenController@acceptRequestUser');
    Route::get('/user/group/{group_id}/decline', 'GruppenController@declineRequestUser');
    Route::get('/user/{id}', 'UserController@getById');

    Route::put('/user/{id}', 'UserController@update');

    Route::delete('/user/{id}', 'UserController@delete');
    Route::delete('/user/game/remove/{id}', 'UserController@removeGame');


    /*
    * Freunde Routes
    */
    Route::post('/friend/add', 'FreundeController@addFriend');

    Route::get('/friends', 'FreundeController@getAll');

    Route::get('/friend/requests', 'FreundeController@allRequests');
    Route::get('/friend/{request_id}/accept', 'FreundeController@acceptRequest');
    Route::get('/friend/{request_id}/decline', 'FreundeController@declineRequest');

    Route::delete('/friend/remove/{id}', 'FreundeController@removeFriend');

    /*
    * Spiele, Publisher, Genre Routes
    */
    Route::post('/game', 'SpieleController@store');

    Route::get('/games', 'SpieleController@getAll');
    Route::get('/publisher', 'SpieleController@getPublisher');
    Route::get('/genre', 'SpieleController@getGenre');
    Route::get('/game/{id}', 'SpieleController@get');

    Route::put('/game/{id}', 'SpieleController@update');

    Route::delete('/game/{id}', 'SpieleController@delete');


    /*
    * Chat Routes
    */
    Route::post('/chatroom/{chatroom_id}/messages', 'ChatController@sendPrivateMessage');
    Route::post('/groupchat/{group_id}/messages', 'ChatController@sendGroupMessage');

    Route::get('/chatroom/{user_id}', 'ChatController@getPrivateChatRoom');
    Route::get('/chatroom/{chatroom_id}/messages', 'ChatController@fetchPrivateMessages');
    Route::get('/groupchat/{group_id}/messages', 'ChatController@fetchGroupMessages');


    /*
    * Termin Routes
    */
    Route::post('/date', 'TerminController@store');
    Route::post('/date/{date_id}/add_user', 'TerminController@addUser');
    Route::post('/date/{date_id}/remove_user', 'TerminController@removeUser');

    Route::get('/dates', 'TerminController@getAll');
    Route::get('/dates/shared', 'TerminController@getAllShared');

    Route::get('/date/requests', 'TerminController@allRequets');
    Route::get('/date/{request_id}/accept', 'TerminController@acceptRequest');
    Route::get('/date/{request_id}/decline', 'TerminController@declineRequest');
    Route::get('/date/{id}', 'TerminController@get');


    Route::put('/date/{id}', 'TerminController@update');

    Route::delete('/date/{id}', 'TerminController@delete');

    /*
   * Notiz Routes
   */
    Route::post('/note', 'NotizController@store');
    Route::post('/note/{note_id}/add_user', 'NotizController@addUser');
    Route::post('/note/{note_id}/remove_user', 'NotizController@removeUser');

    Route::get('/notes', 'NotizController@getAll');
    Route::get('/notes/shared', 'NotizController@getAllShared');
    Route::get('/note/requests', 'NotizController@allRequets');
    Route::get('/note/{request_id}/accept', 'NotizController@acceptRequest');
    Route::get('/note/{request_id}/decline', 'NotizController@declineRequest');
    Route::get('/note/{id}', 'NotizController@get');


    Route::put('/note/{id}', 'NotizController@update');

    Route::delete('/note/{id}', 'NotizController@delete');

    /*
    * Gruppen Routes
    */
    Route::post('/group', 'GruppenController@create');
    Route::post('/group/{group_id}/add_user', 'GruppenController@addUser');
    Route::post('/group/{group_id}/remove_user', 'GruppenController@removeUser');

    Route::get('/groups', 'GruppenController@getAll');
    Route::get('/group/{group_id}/request_access', 'GruppenController@requestAcess');
    Route::get('/group/{group_id}/requests', 'GruppenController@allRequestsGroup');
    Route::get('/group/{group_id}/accept/{user_id}', 'GruppenController@acceptRequestGroup');
    Route::get('/group/{group_id}/decline/{user_id}', 'GruppenController@declineRequestGroup');
    Route::get('/group/{group_id}/attach/date/{date_id}', 'GruppenController@attachTermin');
    Route::get('/group/{group_id}/detach/date/{date_id}', 'GruppenController@detachTermin');
    Route::get('/group/{group_id}/attach/note/{note_id}', 'GruppenController@attachNote');
    Route::get('/group/{group_id}/detach/note/{note_id}', 'GruppenController@detachNote');
    Route::get('/group/{group_id}/notes', 'GruppenController@allNotes');
    Route::get('/group/{group_id}/dates', 'GruppenController@allDates');
    Route::get('/group/{group_id}', 'GruppenController@get');

    Route::delete('/group/{group_id}', 'GruppenController@delete');
});