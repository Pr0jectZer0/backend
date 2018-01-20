<?php

namespace App\Http\Controllers;

use App\Http\Requests\TerminRequest;
use App\Http\Requests\UserIdRequest;
use App\Termin;
use App\UserTermin;
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
        $termin = Termin::with(['user','shared.user'])->find($id);

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
        $termin = Termin::with(['user','shared.user'])->find($id);

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
     * Alle Termine vom Benutzer
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

    /**
     * Alle Termin anfragen
     */
    public function allRequets(Request $request)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $requests = $user->requestsTermine;

        if (count($requests) != 0) {
            $response = [
                'requests' => $requests
            ];
            return response()->json($response, 200);
        } else {
            return response()->json(['message' => 'Keine Termin anfragen.'], 200);
        }

    }

    /**
     * User Termin hinzufügen
     */
    public function addUser(UserIdRequest $request, $date_id)
    {
        $date = Termin::find($date_id);

        if (!$date) {
            return response()->json(['message' => 'Termin wurde nicht gefunden.'], 404);
        }

        $userNote = UserTermin::create([
            'id_termin' => $date_id,
            'id_user' => $request->input('id'),
            'status' => 'angefragt',
        ]);

        return response()->json(['message' => 'Termin anfrage wurde an User gesendet.'], 201);
    }

    /**
     * User Termin entfernen
     */
    public function removeUser(UserIdRequest $request, $date_id)
    {
        $date = Termin::find($date_id);

        if (!$date) {
            return response()->json(['message' => 'Termin wurde nicht gefunden.'], 404);
        }

        $userTermin = UserTermin::where('id_user', $request->input('id'))->where('id_termin', $date_id)->first();
        $userTermin->delete();

        return response()->json(['message' => 'User wurde aus Termin entfernt.'], 201);
    }

    /**
     * Termin Anfrage akzeptieren
     */
    public function acceptRequest(Request $request, $request_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $request = UserTermin::where('id_user',$user->id)->where('id_termin', $request_id)->where('status', 'angefragt')->first();
        if(!$request){
            return response()->json(['message' => 'Termin wurde nicht gefunden oder bereits teilnehmer.'], 404);
        }

        $request->status = 'angenommen';
        $request->save();

        return response()->json(['message' => 'User ist jetzt Teilnehmer des Termins.'], 201);
    }

    /**
     * Termin Anfrage ablehnen
     */
    public function declineRequest(Request $request, $request_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $request = UserTermin::where('id_user',$user->id)->where('id_termin', $request_id)->where('status', 'angefragt')->first();
        if(!$request){
            return response()->json(['message' => 'Termin wurde nicht gefunden oder bereits teilnehmer.'], 404);
        }

        $request->status = 'abgelehnt';
        $request->save();

        return response()->json(['message' => 'User ist jetzt kein Teilnehmer des Termins mehr.'], 201);

    }

    /**
     * Alle angenommene Termine
     */
    public function getAllShared(Request $request){

        $user = JWTAuth::toUser($request->input('token'));

        $notes = $user->sharedTermine;
        $notes->load(['user','shared.user']);

        if (count($notes) != 0) {
            $response = [
                'dates' => $notes
            ];
            return response()->json($response, 200);
        } else {
            return response()->json(['message' => 'Keine Termine.'], 200);
        }
    }


}
