<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdRequest;
use App\Http\Requests\UserRequest;
use App\User;
use App\UserGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Facades\JWTAuth;


class UserController extends Controller
{

    /**
     * Account erstellen
     */
    public function store(UserRequest $request)
    {

        $user = User::create([
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'geheimfrage' => $request->input('geheimfrage'),
            'geheimantwort' => $request->input('geheimantwort'),

        ]);

        return Response::json($user, 201);
    }


    /**
     * Account Informationen abrufen (id)
     */
    public function getById(Request $request, $id)
    {

        if (!$id) {
            $user = JWTAuth::toUser($request->input('token'));
        } else {
            $user = User::find($id);
        }

        if (!$user) {
            return response()->json(['message' => 'User wurde nicht gefunden.'], 404);
        }

        $response = [
            'user' => $user
        ];
        return response()->json($response, 200);
    }

    /**
     * Account Informationen abrufen (token)
     */
    public function getByToken(Request $request)
    {

        $user = JWTAuth::toUser($request->input('token'));

        if (!$user) {
            return response()->json(['message' => 'User wurde nicht gefunden.'], 404);
        }

        $response = [
            'user' => $user
        ];
        return response()->json($response, 200);
    }

    /**
     * Account Informationen updaten
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User wurde nicht gefunden.'], 404);
        }

        $user->name = $request->input('name');
        $user->save();
        return response()->json(['user' => $user], 200);
    }

    /**
     * Account löschen
     */
    public function delete($id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return response()->json(['message' => 'User wurde gelöscht.'], 200);
    }

    /**
     * Liste aller User
     */
    public function getAll()
    {
        $users = User::all();
        $response = [
            'users' => $users
        ];
        return response()->json($response, 200);
    }

    /**
     * Account Spiel hinzufügen
     */
    public function addGame(IdRequest $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        if (UserGame::where('id_user', $user->id)->where('id_spiel', $request->input('id'))->count() == 0) {

            $userGame = UserGame::create([
                'id_user' => $user->id,
                'id_spiel' => $request->input('id'),
                'bewertung' => 0
            ]);

            return response()->json(['message' => 'Spiel wurde User Liste hinzugefügt.'], 201);
        } else {
            return response()->json(['message' => 'Spiel berseits in Liste.'], 400);
        }

    }

    /**
     * Account Spiele anzeigen
     */
    public function showGames(Request $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $response = [
            'games' => $user->games
        ];
        return response()->json($response, 200);
    }

    /**
     * Account Spiel entfernen
     */
    public function removeGame(Request $request, $id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $userGame = UserGame::where('id_user', $user->id)->where('id_spiel', $id)->get();

        if ($userGame->count() != 0) {

            $userGame->first()->delete();
            return response()->json(['message' => 'Spiel wurde aus Liste entfernt.'], 200);

        } else {
            return response()->json(['message' => 'Spiel nicht in Liste.'], 400);
        }

    }


}
