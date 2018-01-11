<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Note;
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
        $note = Note::with('user')->find($id);

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
        $note = Note::with('user')->find($id);

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

        $notes = Note::with('user')->whereHas('user', function ($query) use ($user) {
            $query->where('id', $user->id);
        })->get();


        $response = [
            'notes' => $notes
        ];
        return response()->json($response, 200);
    }
}
