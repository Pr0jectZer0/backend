<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Http\Requests\UserIdRequest;
use App\Note;
use App\UserNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class NotizController extends Controller
{

    /**
     * Notiz erstellen
     */
    public function store(NoteRequest $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $note = Note::create([
            'id_user' => $user->id,
            'titel' => $request->input('titel'),
            'text' => $request->input('text'),

        ]);

        return Response::json($note, 201);
    }


    /**
     * Notiz get by id
     */
    public function get(Request $request, $id)
    {
        $note = Note::with(['user','shared.user'])->find($id);

        if (!$note) {
            return response()->json(['message' => 'Notiz wurde nicht gefunden.'], 404);
        }

        $response = [
            'note' => $note
        ];
        return response()->json($response, 200);
    }

    /**
     * Notiz updaten/ändern
     */

    public function update(Request $request, $id)
    {
        $note = Note::with(['user','shared.user'])->find($id);


        if (!$note) {
            return response()->json(['message' => 'Notiz wurde nicht gefunden.'], 404);
        }

        if ($request->input('titel') != "") {
            $note->titel = $request->input('titel');
        }
        if ($request->input('text') != "") {
            $note->text = $request->input('text');
        }
        $note->save();
        return response()->json(['note' => $note], 200);
    }

    /**
     * Notiz löschen
     */
    public function delete($id)
    {
        $note = Note::findOrfail($id);
        $note->delete();
        return response()->json(['message' => 'Notiz wurde gelöscht.'], 200);
    }

    /**
     * Alle Notizen vom Benutzer
     */
    public function getAll(Request $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $notes = Note::with(['user','shared.user'])->whereHas('user', function ($query) use ($user) {
            $query->where('id', $user->id);
        })->get();


        $response = [
            'notes' => $notes
        ];
        return response()->json($response, 200);
    }

    /**
     * Alle Anfragen einer geteilten Notiz
     */
    public function allRequets(Request $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $requests = $user->requestsNotes;

        if (count($requests) != 0) {
            $response = [
                'requests' => $requests
            ];
            return response()->json($response, 200);
        } else {
            return response()->json(['message' => 'Keine Notiz anfragen.'], 200);
        }

    }

    /**
     * User Notiz hinzufügen
     */
    public function addUser(UserIdRequest $request, $note_id)
    {
        $note = Note::with('user')->find($note_id);

        if (!$note) {
            return response()->json(['message' => 'Notiz wurde nicht gefunden.'], 404);
        }

        $userNote = UserNote::create([
            'id_notiz' => $note_id,
            'id_user' => $request->input('id'),
            'rolle' => 'angefragt',
        ]);

        return response()->json(['message' => 'Notiz anfrage wurde an User gesendet.'], 201);
    }

    /**
     * User Notiz entfernen
     */
    public function removeUser(UserIdRequest $request, $note_id)
    {
        $note = Note::find($note_id);

        if (!$note) {
            return response()->json(['message' => 'Notiz wurde nicht gefunden.'], 404);
        }

        $userNote = UserNote::where('id_user', $request->input('id'))->where('id_notiz', $note_id)->first();
        $userNote->delete();

        return response()->json(['message' => 'User wurde aus Notiz entfernt.'], 201);
    }

    /**
     * Notiz Anfrage akzeptieren
     */
    public function acceptRequest(Request $request, $request_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $request = UserNote::where('id_user',$user->id)->where('id', $request_id)->where('rolle', 'angefragt')->first();
        if(!$request){
            return response()->json(['message' => 'Notiz wurde nicht gefunden oder bereits teilnehmer.'], 404);
        }

        $request->rolle = 'teilnehmer';
        $request->save();

        return response()->json(['message' => 'User ist jetzt Teilnehmer der Notiz.'], 201);
    }

    /**
     * Notiz Anfrage ablehnen
     */
    public function declineRequest(Request $request, $request_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $request = UserNote::where('id_user',$user->id)->where('id', $request_id)->first();
        if(!$request){
            return response()->json(['message' => 'Notiz wurde nicht gefunden oder bereits teilnehmer.'], 404);
        }

        $request->delete();

        return response()->json(['message' => 'User ist jetzt kein Teilnehmer der Notiz mehr.'], 201);

    }

    /**
     * Alle Notizen durch Einladung
     */
    public function getAllShared(Request $request){

        $user = JWTAuth::toUser($request->input('token'));

        $notes = $user->sharedNotes;
        $notes->load(['user','shared.user']);

        if (count($notes) != 0) {
            $response = [
                'notes' => $notes
            ];
            return response()->json($response, 200);
        } else {
            return response()->json(['message' => 'Keine Notizen.'], 200);
        }
    }
}
