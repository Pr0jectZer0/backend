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
    public function getPrivateChatRoom(Request $request, $user_id)
    {

        $user = JWTAuth::toUser($request->input('token'));
        $chatUser = User::findOrfail($user_id);

        $chatRoomFriend = ChatRoom::where('user_id', $user_id)->get(['chatroom_id'])->toArray();;
        $chatRoomMe = ChatRoom::where('user_id', $user->id)->get(['chatroom_id'])->toArray();

        print_r($chatRoomFriend);
        print_r($chatRoomMe);

        die;

        $chatRoomId = array_intersect($chatRoomFriend, $chatRoomMe);

        //$chatRoom = $chatRoom->where('user_id', $user->id);

        dd($chatRoomId);

        if (count($chatRoomId) != 2) {
            $chatRoom = ChatRoom::orderBy('id', 'desc')->get();

            if (count($chatRoom) != 0) {
                $chatRoom = $chatRoom->first();
                $lastId = $chatRoom->chatroom_id;
                $lastId++;
            } else {
                $lastId = 0;
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
        } else {
            $chatRoom = $chatRoom->first();
        }

        return response()->json(['chatroom' => $chatRoom->chatroom_id], 200);
    }

    public function fetchMessages(Request $request, $chatroom_id)
    {
        //$user = JWTAuth::toUser($request->input('token'));
        //$chatRoom = ChatRoom::where('chatroom_id', $chatroom_id)->where('user_id', '!=', $user->id)->first();
        //$chatUser = User::findOrfail($chatRoom->user_id);
        $message = Message::with('user')->where('chatroom_id', $chatroom_id)->get();
        return response()->json(['message' => $message], 200);
    }

    public function sendMessage(Request $request, $chatroom_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $message = $user->messages()->create([
            'chatroom_id' => $chatroom_id,
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return response()->json(['message' => 'Nachricht wurde gesendet.'], 201);
    }
}
