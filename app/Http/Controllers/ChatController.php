<?php

namespace App\Http\Controllers;

use App\ChatRoom;
use App\Events\GroupMessageSent;
use App\Events\MessageSent;
use App\Group;
use App\GroupMessage;
use App\Http\Requests\MesseageRequest;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;


class ChatController extends Controller
{

    /**
     * Private Chat Room Id erhalten
     */
    public function getPrivateChatRoom(Request $request, $user_id)
    {

        $user = JWTAuth::toUser($request->input('token'));
        $chatUser = User::findOrfail($user_id);

        $chatRoomFriend = ChatRoom::where('user_id', $user_id)->pluck('chatroom_id')->toArray();;
        $chatRoomMe = ChatRoom::where('user_id', $user->id)->pluck('chatroom_id')->toArray();


        $chatRoomId = array_intersect($chatRoomFriend, $chatRoomMe);

        if (count($chatRoomId) != 1) {
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

            $chatRoomId = $lastId;
        }else{
            $chatRoomId = $chatRoomId[0];
        }

        return response()->json(['chatroom' => $chatRoomId], 200);
    }


    /**
     * Private Nachricht erhalten
     *
     * Pusher Channel: private-chat.{PrivateChatRoomId}
     *
     * Pusher Event Name: App\Events\MessageSent
     */
    public function fetchPrivateMessages(Request $request, $chatroom_id)
    {
        //$user = JWTAuth::toUser($request->input('token'));
        //$chatRoom = ChatRoom::where('chatroom_id', $chatroom_id)->where('user_id', '!=', $user->id)->first();
        //$chatUser = User::findOrfail($chatRoom->user_id);
        $message = Message::with('user')->where('chatroom_id', $chatroom_id)->get();
        return response()->json(['message' => $message], 200);
    }

    /**
     * Private Nachricht senden
     */
    public function sendPrivateMessage(MesseageRequest $request, $chatroom_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $message = $user->messages()->create([
            'chatroom_id' => $chatroom_id,
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return response()->json(['message' => 'Nachricht wurde gesendet.'], 201);
    }


    /**
     * Gruppen Nachricht erhalten
     *
     * Pusher Channel: private-group-chat.{GroupId}
     *
     * Pusher Event Name: App\Events\GroupMessageSent
     */

    public function fetchGroupMessages(Request $request, $group_id)
    {

        $group = Group::find($group_id);

        if (!$group) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden.'], 404);
        }
        //$user = JWTAuth::toUser($request->input('token'));
        //$chatRoom = ChatRoom::where('chatroom_id', $chatroom_id)->where('user_id', '!=', $user->id)->first();
        //$chatUser = User::findOrfail($chatRoom->user_id);
        $message = GroupMessage::with(['user'])->where('group_id', $group_id)->get();
        return response()->json(['message' => $message], 200);
    }

    /**
     * Gruppen Nachricht senden
     */
    public function sendGroupMessage(MesseageRequest $request, $group_id)
    {
        $user = JWTAuth::toUser($request->input('token'));

        $group = Group::find($group_id);

        if (!$group) {
            return response()->json(['message' => 'Gruppe wurde nicht gefunden.'], 404);
        }

        $message = $user->groupMessages()->create([
            'group_id' => $group_id,
            'message' => $request->input('message')
        ]);

        broadcast(new GroupMessageSent($user, $message))->toOthers();


        return response()->json(['message' => 'Nachricht wurde gesendet.'], 201);
    }
}
