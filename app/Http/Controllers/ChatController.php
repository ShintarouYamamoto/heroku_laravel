<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Reaction;
use App\ChatUser;
use App\ChatMessage;

class ChatController extends Controller
{
    public function list()
    {
        $user = Auth::user();
        $to_rooms = Reaction::where('to_user_id', $user->id)->where('status', 1)->get();
        $from_rooms = Reaction::where('from_user_id', $user->id)->where('status', 1)->get();
        return view('chat.chat_list')->with([
            'to_rooms' => $to_rooms,
            'from_rooms' => $from_rooms,
        ]);
    }

    public function room($chat_room_id)
    {
        $user = Auth::user();

        $chatuser = ChatUser::where('chat_room_id', $chat_room_id)
            ->where('user_id', '!=', $user->id)
            ->firstOrFail();

        $chatmessages = ChatMessage::where('chat_room_id', $chat_room_id)->get();

        return view('chat.chat_room')->with([
            'chatuser' => $chatuser,
            'chatmessages' => $chatmessages
        ]);
    }

    public function store(Request $request)
    {
        $validate_rule = [
            'message' => 'required|string',
        ];
        $this->validate($request, $validate_rule);

        $chatmessage = new ChatMessage();
        $chatmessage->chat_room_id = $request->chat_room_id;
        $chatmessage->message = $request->message;
        $chatmessage->user_id = Auth::user()->id;
        $chatmessage->save();

        return redirect()->back();
    }
}
