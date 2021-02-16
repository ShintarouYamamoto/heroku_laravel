<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\ChatUser;
use App\ChatMessage;

class ChatController extends Controller
{
    public function list()
    {
        $user = Auth::user();

        $auth_chatusers = ChatUser::where('user_id', $user->id)->get();
        foreach ($auth_chatusers as $auth_chatuser) {
            $chatusers[] =  ChatUser::where('chat_room_id', $auth_chatuser->chat_room_id)
                ->where('user_id', '!=', $user->id)
                ->firstOrFail();
        }

        return view('chat.chat_list')->with([
            'chatusers' => $chatusers
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
