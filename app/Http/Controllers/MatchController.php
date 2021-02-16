<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;

use App\Chatroom;
use App\ChatUser;

use Auth;

use App\Reaction;

class MatchController extends Controller
{
    public function store($post_id)
    {
        $post = Post::where('id', $post_id)->firstOrFail();

        $reaction = new Reaction;
        $reaction->post_id = $post_id;
        $reaction->to_user_id = $post->user_id;
        $reaction->from_user_id = Auth::user()->id;
        $reaction->status = 0; //未マッチ
        $reaction->save();

        return redirect()->back();
    }

    public function delete($post_id)
    {
        $post = Post::where('id', $post_id)->firstOrFail();

        $reaction = Reaction::where('from_user_id',  Auth::user()->id)
            ->where('to_user_id', $post->user_id)
            ->where('post_id', $post_id);

        $reaction->delete();
        return redirect()->back();
    }

    public function permit($reaction_id)
    {
        $reaction = Reaction::where('id', $reaction_id)->firstOrFail();
        $reaction->status = 1;
        $reaction->save();

        $chatroom = new Chatroom();
        $chatroom->post_id = $reaction->post_id;
        $chatroom->save();

        $chatuser = new ChatUser();
        $chatuser->chat_room_id = $chatroom->id;
        $chatuser->user_id = $reaction->to_user_id;
        $chatuser->save();

        $chatuser = new ChatUser();
        $chatuser->chat_room_id = $chatroom->id;
        $chatuser->user_id = $reaction->from_user_id;
        $chatuser->save();


        return redirect('/timeline/' . $reaction->post_id);
    }
}
