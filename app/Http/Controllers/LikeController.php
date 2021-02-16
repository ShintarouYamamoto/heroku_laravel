<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Like;

class LikeController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $like = new Like;
        $like->post_id = $request->post_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $like = Like::where('post_id', $request->post_id)->where('user_id', Auth::user()->id);
        $like->delete();
        return redirect()->back();
    }
}
