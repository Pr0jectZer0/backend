<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupUser;
use App\Http\Requests\GroupRequest;
use App\Http\Requests\IdRequest;
use App\Http\Requests\UserIdRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class GruppenController extends Controller
{

    public function create(GroupRequest $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $group = Group::create([
            'name' => $request->input('name'),
            'beschreibung' => $request->input('beschreibung'),
        ]);

        $groupUser = GroupUser::create([
            'id_gruppe' => $group->id,
            'id_user' => $user->id,
            'rolle' => 'admin',
        ]);


        $groupFinal = Group::with('users.user')->find($group->id);

        return Response::json($groupFinal, 201);
    }

    public function get(Request $request, $id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $group = Group::with('users.user')->find($id);

        if (!$group) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden.'], 404);
        }

        $response = [
            'group' => $group
        ];
        return response()->json($response, 200);
    }

    public function addUser(UserIdRequest $request, $id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $group = Group::find($id);

        if (!$group) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden.'], 404);
        }

        $groupAdmin = GroupUser::where('id_gruppe', $id)->where('id_user', $user->id)->where('rolle', 'admin')->first();

        if (!$groupAdmin) {
            return response()->json(['message' => 'Keine rechte um Nutzer hinzuzufügen.'], 404);
        }

        $groupUser = GroupUser::where('id_gruppe', $id)->where('id_user', $request->input('id'))->first();

        if ($groupUser) {
            return response()->json(['message' => 'User bereits in Gruppe.'], 404);
        }

        $groupUser = GroupUser::create([
            'id_gruppe' => $group->id,
            'id_user' => $request->input('id'),
            'rolle' => 'angefragt',
        ]);

        return response()->json(['message' => 'User wurde in Gruppe hinzugefügt.'], 201);

    }

    public function removeUser(UserIdRequest $request, $id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $group = Group::find($id);

        if (!$group) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden.'], 404);
        }

        //User kann sich selbst entfernen
        if ($user->id != $request->input('id')) {
            $groupAdmin = GroupUser::where('id_gruppe', $id)->where('id_user', $user->id)->where('rolle', 'admin')->first();

            if (!$groupAdmin) {
                return response()->json(['message' => 'Keine rechte um Nutzer zu entfernen.'], 404);
            }
        }

        $groupUser = GroupUser::where('id_gruppe', $id)->where('id_user', $request->input('id'))->first();

        if(!$groupUser){
            return response()->json(['message' => 'User wurde in der Gruppe nicht gefunden.'], 404);
        }

        $groupUser->delete();

        return response()->json(['message' => 'User wurde aus Gruppe entfenrt.'], 200);

    }

    public function allRequests(Request $request){

    }

    public function acceptRequest(Request $request, $id)
    {

    }

    public function declineRequest(Request $request, $id)
    {

    }

    public function delete($id)
    {

    }

    public function getAll()
    {
        $notes = Note::all();
        $response = [
            'notes' => $notes
        ];
        return response()->json($response, 200);
    }

}
