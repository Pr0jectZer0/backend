<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class UserController extends Controller
{

    public function store(UserRequest $request){

        $user = User::create([
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'alter_jahre' => $request->input('alter_jahre'),
            'email' =>  $request->input('email'),
            'geheimfrage' => $request->input('geheimfrage'),
            'geheimantwort' =>  $request->input('geheimantwort'),

        ]);


        return Response::json($user, 201);
    }


    public function get(Request $request, $id){

        $user = User::find($id);
        $response = [
            'user' => $user
        ];
        return response()->json($response, 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->name = $request->input('name');
        $user->save();
        return response()->json(['user' => $user], 200);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'User deleted'], 200);
    }
}
