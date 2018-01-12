<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupNote;
use App\GroupUser;
use App\Http\Requests\GroupRequest;
use App\Http\Requests\IdRequest;
use App\Http\Requests\UserIdRequest;
use App\Note;
use App\User;
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

    public function get(Request $request, $group_id)
    {

        $user = JWTAuth::toUser($request->input('token'));

        $group = Group::with('users.user')->find($group_id);

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

    public function addUser(UserIdRequest $request, $group_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $group = Group::find($group_id);

        if (!$group) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden.'], 404);
        }

        $groupAdmin = GroupUser::where('id_gruppe', $group_id)->where('id_user', $user->id)->where('rolle', 'admin')->first();

        if (!$groupAdmin) {
            return response()->json(['message' => 'Keine rechte um Nutzer hinzuzufügen.'], 404);
        }

        $groupUser = GroupUser::where('id_gruppe', $group_id)->where('id_user', $request->input('id'))->first();

        if ($groupUser) {
            return response()->json(['message' => 'User bereits in Gruppe.'], 404);
        }

        $groupUser = GroupUser::create([
            'id_gruppe' => $group->id,
            'id_user' => $request->input('id'),
            'rolle' => 'angefragt_user',
        ]);

        return response()->json(['message' => 'User wurde in Gruppe hinzugefügt.'], 201);
    }

    /**
     * Anfrage an Gruppe
     */
    public function requestAcess(Request $request, $group_id)
    {

        $user = JWTAuth::toUser($request->input('token'));

        $group = Group::find($group_id);

        if (!$group) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden.'], 404);
        }

        $groupUser = GroupUser::where('id_gruppe', $group_id)->where('id_user', $user->id)->first();

        if ($groupUser) {
            return response()->json(['message' => 'User bereits in Gruppe.'], 404);
        }

        $groupUser = GroupUser::create([
            'id_gruppe' => $group->id,
            'id_user' => $user->id,
            'rolle' => 'angefragt_gruppe',
        ]);

        return response()->json(['message' => 'Anfrage an Gruppe wurde gesendet.'], 201);

    }

    /**
     *  User entfernen auf Gruppe
     */
    public function removeUser(UserIdRequest $request, $group_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $group = Group::find($group_id);

        if (!$group) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden.'], 404);
        }

        //User kann sich selbst entfernen
        if ($user->id != $request->input('id')) {
            $groupAdmin = GroupUser::where('id_gruppe', $group_id)->where('id_user', $user->id)->where('rolle', 'admin')->first();

            if (!$groupAdmin) {
                return response()->json(['message' => 'Keine Rechte um Nutzer zu entfernen.'], 404);
            }
        }

        $groupUser = GroupUser::where('id_gruppe', $group_id)->where('id_user', $request->input('id'))->first();

        if (!$groupUser) {
            return response()->json(['message' => 'User wurde in der Gruppe nicht gefunden.'], 404);
        }

        $groupUser->delete();

        return response()->json(['message' => 'User wurde aus Gruppe entfenrt.'], 200);

    }

    /**
     * Alle Grupen Anfragen an User
     */
    public function allRequestsUser(Request $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $groups = GroupUser::with('group')->where('id_user', $user->id)->where('rolle', 'angefragt_user')->get();

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
     * Alle Gruppen Anfragen an Gruppe
     */
    public function allRequestsGroup(Request $request, $group_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $groups = GroupUser::with('group')->where('id_gruppe', $group_id)->where('rolle', 'angefragt_gruppe')->get();

        if (count($groups) != 0) {
            $response = [
                'requests' => $groups
            ];
            return response()->json($response, 200);
        } else {
            return response()->json(['message' => 'Keine Gruppen anfragen.'], 200);
        }
    }

    /**
     * Gruppen Anfrage akzeptieren von Gruppe
     */
    public function acceptRequestUser(Request $request, $group_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $groupRequest = GroupUser::where('id_gruppe', $group_id)->where('id_user', $user->id)->where('rolle', 'angefragt_user')->first();

        if (!$groupRequest) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden oder bereits drin.'], 404);
        }

        $groupRequest->rolle = 'mitglied';
        $groupRequest->save();

        return response()->json(['message' => 'Gruppen anfrage wurde angenommen.'], 200);

    }

    /**
     * Gruppen Anfrage ablehnen von Gruppe
     */
    public function declineRequestUser(Request $request, $group_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $groupRequest = GroupUser::where('id_gruppe', $group_id)->where('id_user', $user->id)->first();

        if (!$groupRequest) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden.'], 404);
        }

        $groupRequest->delete();

        return response()->json(['message' => 'Gruppen anfrage wurde abgelehnt.'], 200);

    }

    /**
     * User Anfrage an Gruppe akzeptieren
     */
    public function acceptRequestGroup(Request $request, $group_id, $user_id)
    {

        $user = JWTAuth::toUser($request->input('token'));

        $groupAdmin = GroupUser::where('id_gruppe', $group_id)->where('id_user', $user->id)->where('rolle', 'admin')->first();

        if (!$groupAdmin) {
            return response()->json(['message' => 'Keine Rechte um User anzunehmen.'], 404);
        }

        $user = User::find($user_id);

        if (!$user) {
            return response()->json(['message' => 'User wurde nicht gefunden.'], 404);
        }

        $groupRequest = GroupUser::where('id_gruppe', $group_id)->where('id_user', $user->id)->where('rolle', 'angefragt_gruppe')->first();

        if (!$groupRequest) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden oder bereits drin.'], 404);
        }

        $groupRequest->rolle = 'mitglied';
        $groupRequest->save();

        return response()->json(['message' => 'Gruppen anfrage wurde angenommen.'], 200);

    }

    /**
     * User Anfrage an Gruppe ablehnen
     */
    public function declineRequestGroup(Request $request, $group_id, $user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return response()->json(['message' => 'User wurde nicht gefunden.'], 404);
        }

        $groupRequest = GroupUser::where('id_gruppe', $group_id)->where('id_user', $user->id)->first();

        if (!$groupRequest) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden.'], 404);
        }

        $groupRequest->delete();

        return response()->json(['message' => 'Gruppen anfrage wurde abgelehnt.'], 200);

    }

    /**
     * Gruppen löschen
     */

    public function delete(Request $request, $group_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $group = Group::whereHas('users', function ($query) use ($user) {
            $query->where('id_user', $user->id);
            $query->where('rolle', 'admin');
        })->where('id', $group_id)->first();

        if (!$group) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden oder keine Rechte.'], 404);
        }

        $group->delete();

        return response()->json(['message' => 'Gruppe wurde gelöscht.'], 200);

    }

    /**
     * Alle Gruppen eines Benutzers
     */
    public function getAllUser(Request $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $groups = Group::with('users.user')->whereHas('users', function ($query) use ($user) {
            $query->where('id_user', $user->id);
            $query->where('rolle', '!=', 'angefragt_user');
            $query->where('rolle', '!=', 'angefragt_gruppe');
        })->get();

        if (!$groups) {
            return response()->json(['message' => 'Sie sind in keinen Gruppen.'], 404);
        }

        $response = [
            'groups' => $groups
        ];

        return response()->json($response, 200);
    }

    /**
     * Alle Gruppen anzeigen
     */
    public function getAll(Request $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $groups = Group::all();

        if (!$groups) {
            return response()->json(['message' => 'Keine Gruppen vorhanden.'], 404);
        }

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

        $notes = Note::whereHas('groups', function ($query) use ($group_id) {
            $query->where('id_gruppe', $group_id);
        })->get();


        if (count($notes) == 0) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden oder besitzt keine Notizen.'], 404);
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

    /**
     * Gruppe Notiz entfernen
     */
    public function detachNote(Request $request, $group_id, $note_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $note = Note::find($note_id);

        if (!$note) {
            return response()->json(['message' => 'Notiz wurde nicht gefunden.'], 404);
        }

        $group = Group::find($group_id);

        if (!$group) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden.'], 404);
        }

        $groupNote = GroupNote::where('id_gruppe', $group->id)->where('id_notiz', $note->id)->first();
        $groupNote->delete();

        return response()->json(['message' => 'Notiz aus Gruppe entfernt.'], 200);
    }
}
