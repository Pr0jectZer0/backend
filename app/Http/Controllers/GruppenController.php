<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupNote;
use App\GroupUser;
use App\Http\Requests\GroupRequest;
use App\Http\Requests\IdRequest;
use App\Http\Requests\UserIdRequest;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class GruppenController extends Controller
{

    /**
     * Gruppe erstellen
     */
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

    /**
     * Gruppe by id
     */

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

    /**
     * Gruppe User hinzufügen (anfrage)
     */

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

    /**
     * Gruppe User entfernen
     */
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

        if (!$groupUser) {
            return response()->json(['message' => 'User wurde in der Gruppe nicht gefunden.'], 404);
        }

        $groupUser->delete();

        return response()->json(['message' => 'User wurde aus Gruppe entfenrt.'], 200);

    }

    /**
     * Alle Grupen anfragen
     */
    public function allRequests(Request $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $groups = GroupUser::with('group')->where('id_user', $user->id)->where('rolle', 'angefragt')->get();

        if (count($groups) != 0) {
            $response = [
                'groups' => $groups
            ];
            return response()->json($response, 200);
        } else {
            return response()->json(['message' => 'Keine Gruppen anfragen.'], 200);
        }
    }

    /**
     * Gruppen anfrage akzeptieren
     */
    public function acceptRequest(Request $request, $id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $groupRequest = GroupUser::where('id_gruppe', $id)->where('id_user', $user->id)->where('rolle', 'angefragt')->first();

        if (!$groupRequest) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden oder bereits drin.'], 404);
        }

        $groupRequest->rolle = 'mitglied';
        $groupRequest->save();

        return response()->json(['message' => 'Gruppen anfrage wurde angenommen.'], 200);

    }

    /**
     * Gruppen anfrage ablehnen
     */
    public function declineRequest(Request $request, $id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $groupRequest = GroupUser::where('id_gruppe', $id)->where('id_user', $user->id)->first();

        if (!$groupRequest) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden.'], 404);
        }

        $groupRequest->delete();

        return response()->json(['message' => 'Gruppen anfrage wurde abgelehnt.'], 200);

    }

    /**
     * Gruppen löschen
     */

    public function delete(Request $request, $id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $group = Group::whereHas('users', function ($query) use ($user) {
            $query->where('id_user', $user->id);
            $query->where('rolle', 'admin');
        })->where('id', $id)->first();

        if (!$group) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden oder keine Rechte.'], 404);
        }

        $group->delete();

        return response()->json(['message' => 'Gruppe wurde gelöscht.'], 200);

    }

    /**
     * Alle Gruppen eines Benutzers
     */
    public function getAll(Request $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $groups = $user->groups;
        $groups->load('users');

        $response = [
            'groups' => $groups
        ];

        return response()->json($response, 200);
    }

    /**
     * Alle Notizen einer Gruppe
     */
    public function allNotes(Request $request, $group_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $notes = Group::with('notes.note')->find($group_id);

        $notes = Note::whereHas('groups', function ($query) use ($group_id) {
            $query->where('id_gruppe', $group_id);
        })->get();


        if (!$notes) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden.'], 404);
        }

        return response()->json($notes, 200);
    }

    /**
     * Gruppe Notiz hinzufügen
     */
    public function attachNote(Request $request, $group_id, $note_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $note = $user->notes->find($note_id);

        if (!$note) {
            return response()->json(['message' => 'Notiz wurde nicht gefunden.'], 404);
        }

        $group = $user->groups->find($group_id);

        if (!$group) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden.'], 404);
        }

        $groupNote = GroupNote::create([
            'id_gruppe' => $group_id,
            'id_notiz' => $note_id,
        ]);

        return response()->json(['message' => 'Notiz wurde Gruppe hinzugefügt.'], 200);
    }


}
