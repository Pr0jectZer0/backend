<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Http\Requests\IdRequest;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class FreundeController extends Controller
{

    /**
     * Freundesliste
     */
    public function getAll(Request $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $friends = $user->friends;
        $friends->load('friendUser');

        $response = [
            'friends' => $friends
        ];
        return response()->json($response, 200);

    }

    /**
     * Freund hinzufügen
     */
    public function addFriend(IdRequest $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        if (Friend::where('id_user1', $user->id)->where('id_user2', $request->input('id'))->count() == 0) {

            $friends = new Friend();
            $friends->id_user1 = $user->id;
            $friends->id_user2 = $request->input('id');
            $friends->status = 0;
            $friends->save();

            return response()->json(['message' => 'User sind jetzt befreundet.'], 201);
        } else {
            return response()->json(['message' => 'User bereits befreundet.'], 400);
        }
    }

    /**
     * Freund entfernen
     */
    public function removeFriend(Request $request, $id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $friends = Friend::where('id_user1', $user->id)->where('id_user2', $id)->get();
        $friends2 = Friend::where('id_user2', $user->id)->where('id_user1', $id)->get();

        if ($friends->count() != 0) {

            $friends->first()->delete();
            $friends2->first()->delete();
            return response()->json(['message' => 'User nicht mehr befreundet.'], 200);

        } else {
            return response()->json(['message' => 'User nicht befreundet.'], 400);
        }
    }

    /**
     * Alle Freundschaftsanfrage anzeigen
     */
    public function allRequests(Request $request)
    {

        $user = JWTAuth::toUser($request->input('token'));

        $friends = $user->friendsRequest;
        $friends->load('user');


        if (count($friends) != 0) {

            $response = [
                'requests' => $friends
            ];
            return response()->json($response, 200);

        } else {
            return response()->json(['message' => 'Keine Freundschaftsanfragen.'], 400);
        }


    }

    /**
     * Freundschaftsanfrage akzeptieren
     */
    public function acceptRequest(Request $request, $request_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $request = $user->friendsRequest->find($request_id);

        if (!$request) {
            return response()->json(['message' => 'Ungültige Freundschaftsanfrage.'], 400);
        }

        $request->status = 1;
        $request->save();

        $friends = new Friend();
        $friends->id_user1 = $request->id_user2;
        $friends->id_user2 = $request->id_user1;
        $friends->status = 1;
        $friends->save();

        return response()->json(['message' => 'Freundschaftsanfrage wurde angenommen.'], 200);
    }

    /**
     * Freundschaftsanfrage ablehnen
     */
    public function declineRequest(Request $request, $request_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $request = $user->friends->find($request_id);

        if (!$request) {
            return response()->json(['message' => 'Ungültige Freundschaftsanfrage.'], 400);
        }

        $request->delete();
        return response()->json(['message' => 'Freundschaftsanfrage wurde abgelehnt.'], 200);
    }

}
