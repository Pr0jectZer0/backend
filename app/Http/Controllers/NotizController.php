<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class NotizController extends Controller
{
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


    public function get(Request $request, $id)
    {

        $note = Note::find($id);

        if (!$note) {
            return response()->json(['message' => 'Notiz wurde nicht gefunden.'], 404);
        }

        $response = [
            'note' => $note
        ];
        return response()->json($response, 200);
    }

    public function update(Request $request, $id)
    {
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['message' => 'Notiz wurde nicht gefunden.'], 404);
        }

        $note->name = $request->input('name');
        $note->save();
        return response()->json(['note' => $note], 200);
    }

    public function delete($id)
    {
        $note = Note::findOrfail($id);
        $note->delete();
        return response()->json(['message' => 'Notiz wurde gelöscht.'], 200);
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
