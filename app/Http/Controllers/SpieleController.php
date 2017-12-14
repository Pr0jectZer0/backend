<?php

namespace App\Http\Controllers;

use App\Game;
use App\Genre;
use App\Http\Requests\GameRequest;
use App\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SpieleController extends Controller
{
    public function store(GameRequest $request){

        $game = Game::create([
            'id_genre' => $request->input('id_genre'),
            'id_publisher' => $request->input('id_publisher'),
            'name' => $request->input('name'),
            'beschreibung' =>  $request->input('beschreibung'),
        ]);

        return Response::json($game, 201);
    }


    public function get(Request $request, $id){

        $game = Game::find($id);


        if (!$game) {
            return response()->json(['message' => 'Spiel wurde nicht gefunden.'], 404);
        }

        $response = [
            'game' => $game
        ];
        return response()->json($response, 200);
    }

    public function update(Request $request, $id)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json(['message' => 'Spiel wurde nicht gefunden.'], 404);
        }

        $game->name = $request->input('name');
        $game->save();
        return response()->json(['user' => $game], 200);
    }

    public function delete($id)
    {
        $game = Game::findOrfail($id);
        $game->delete();
        return response()->json(['message' => 'Spiel wurde gelöscht.'], 200);
    }

    public function getAll(){
        $games = Game::all();
        $response = [
            'games' => $games
        ];
        return response()->json($response, 200);
    }

    public function getPublisher(){
        $publisher = Publisher::all();
        $response = [
            'publisher' => $publisher
        ];
        return response()->json($response, 200);
    }

    public function getGenre(){
        $genre = Genre::all();
        $response = [
            'Genre' => $genre
        ];
        return response()->json($response, 200);
    }
}
