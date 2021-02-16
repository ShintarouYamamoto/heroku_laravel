<?php

namespace App\Http\Controllers;

use App\Chatroom;
use App\Post;

use App\Reaction;

use Validator;


use Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //最初にログイン確認
    }

    public function new()
    {
        $user = Auth::user();

        return view('post.new', ['user' => $user]);
    }

    public function create(Request $request)
    {
        $validate_rule = [
            'help' => 'required',
            'desire' => 'required',
        ];
        $this->validate($request, $validate_rule);

        $post = new Post;

        $post->user_id = $request->user_id;
        $post->help = $request->help;
        $post->desire = $request->desire;
        $post->save();

        return redirect('/new');
    }

    public function timeline()
    {
        $this->middleware('auth');

        $user = Auth::user();
        $posts = Post::limit(9)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('post.timeline', ['user' => $user], ['posts' => $posts]);
    }

    public function detail($post_id)
    {
        $this->middleware('auth');
        $user = Auth::user();
        $post = Post::where('id', $post_id)
            ->firstOrFail();


        return view('post.detail')->with([
            'user' => $user,
            'post' => $post,
        ]);
    }

    public function list($post_id)
    {
        $post = Post::where('id', $post_id)->firstOrFail();
        $reactions= Reaction::where('post_id', $post->id)->get();


        return view('post.reaction')->with([
            'post' => $post,
            'reactions' => $reactions,
        ]);
    }

    public function delete($post_id)
    {
        $post = POST::where('id', $post_id);
        $post->delete();

        return redirect('/user/'. Auth::user()->id);
    }
}
