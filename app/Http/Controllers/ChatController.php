<?php

namespace App\Http\Controllers;

use App\ChatRoom;
use App\Events\MessageSent;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;


class ChatController extends Controller
{
    public function fetchMessages(Request $request, $id)
    {
        $user = JWTAuth::toUser($request->input('token'));
        $chatUser = User::findOrfail($id);

        $chatRoom = ChatRoom::whereIn('user_id', [$user->id, $chatUser->id])->get();

        if (count($chatRoom) != 2) {
            return response()->json(['message' => 'Keine Nachrichten vorhanden.'], 200);
        } else {

            $chatRoom = $chatRoom->first();

            $message = Message::with('user')->where('chatroom_id', $chatRoom->chatroom_id)->get();
            return response()->json(['message' => $message], 200);
        }
    }

    public function sendMessage(Request $request, $id)
    {
        $user = JWTAuth::toUser($request->input('token'));
        $chatUser = User::findOrfail($id);

        $chatRoom = ChatRoom::whereIn('user_id', [$user->id, $chatUser->id])->get();

        if (count($chatRoom) != 2) {
            $lastId = ChatRoom::orderBy('id', 'desc')->first();

            if ($lastId) {
                $lastId++;
            } else {
                $lastId = 1;
            }

            $chatRoom = new ChatRoom();
            $chatRoom->chatroom_id = $lastId;
            $chatRoom->user_id = $chatUser->id;
            $chatRoom->status = 1;
            $chatRoom->save();

            $chatRoom = new ChatRoom();
            $chatRoom->chatroom_id = $lastId;
            $chatRoom->user_id = $user->id;
            $chatRoom->status = 1;
            $chatRoom->save();
        }else{
            $chatRoom = $chatRoom->first();
        }

        $message = $user->messages()->create([
            'chatroom_id' => $chatRoom->chatroom_id,
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return response()->json(['message' => 'Nachricht wurde gesendet.'], 201);
    }
}
