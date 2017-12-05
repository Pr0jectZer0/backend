<?php

namespace App\Http\Controllers;

use App\Friend;
use App\Http\Requests\IdRequest;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class FreundeController extends Controller
{
    public function getAll(Request $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $response = [
            'friends' => $user->friendList()
        ];
        return response()->json($response, 200);

    }


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


    public function removeFriend(Request $request, $id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $friends = Friend::where('id_user1', $user->id)->where('id_user2',$id)->get();

        if ($friends->count() != 0) {

            $friends->first()->delete();
            return response()->json(['message' => 'User nicht mehr befreundet.'], 200);

        } else {
            return response()->json(['message' => 'User nicht befreundet.'], 400);
        }
    }

}
