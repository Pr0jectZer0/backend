<?php

namespace App\Http\Controllers;

use App\Http\Requests\TerminRequest;
use App\Termin;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Response;

class TerminController extends Controller
{
    /**
     * Termin erstellen
     */
    public function store(TerminRequest $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $termin = Termin::create([
            'id_user' => $user->id,
            'titel' => $request->input('titel'),
            'beschreibung' => $request->input('beschreibung'),
            'end_datum' => $request->input('end_datum'),
            'start_datum' => $request->input('start_datum'),

        ]);

        return Response::json($termin, 201);
    }


    /**
     * Termin get by id
     */
    public function get(Request $request, $id)
    {
        $termin = Termin::with('user')->find($id);

        if (!$termin) {
            return response()->json(['message' => 'Termin wurde nicht gefunden.'], 404);
        }

        $response = [
            'date' => $termin
        ];
        return response()->json($response, 200);
    }

    /**
     * Termin updaten/ändern
     */

    public function update(Request $request, $id)
    {
        $termin = Termin::with('user')->find($id);

        if (!$termin) {
            return response()->json(['message' => 'Termin wurde nicht gefunden.'], 404);
        }

        if ($request->input('titel') != "") {
            $termin->titel = $request->input('titel');
        }
        if ($request->input('beschreibung') != "") {
            $termin->text = $request->input('beschreibung');
        }
        if ($request->input('end_datum') != "") {
            $termin->text = $request->input('end_datum');
        }
        if ($request->input('start_datum') != "") {
            $termin->text = $request->input('start_datum');
        }
        $termin->save();
        return response()->json(['date' => $termin], 200);
    }

    /**
     * Termin löschen
     */
    public function delete($id)
    {
        $termin = Termin::findOrfail($id);
        $termin->delete();
        return response()->json(['message' => 'Termin wurde gelöscht.'], 200);
    }

    /**
     * Alle Termin vom Benutzer
     */
    public function getAll(Request $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $termin = Termin::with('user')->whereHas('user', function ($query) use ($user) {
            $query->where('id', $user->id);
        })->get();


        $response = [
            'dates' => $termin
        ];
        return response()->json($response, 200);
    }
}
