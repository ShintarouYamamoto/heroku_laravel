<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Follow;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store($user_id)
    {
        $follow = new Follow;
        $follow->followed_id = $user_id;
        $follow->following_id = Auth::user()->id;
        $follow->save();

        return redirect()->back();
    }

    public function delete($user_id)
    {
        $follow = Follow::where('followed_id', $user_id)->where('following_id', Auth::user()->id);
        $follow->delete();
        return redirect()->back();
    }

    public function following_list($user_id)
    {
        $follows = Follow::where('following_id', $user_id)->get();

        return view('user.following_list')->with([
            'follows' => $follows,
        ]);
    }

    public function followers_list($user_id)
    {
        $follows = Follow::where('followed_id', $user_id)->get();;

        return view('user.followers_list')->with([
            'follows' => $follows,
        ]);
    }
}
