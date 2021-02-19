<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Reaction;
use Validator;
use Illuminate\Support\Facades\Storage;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //最初にログイン確認
    }

    public function show($user_id)
    {
        $user = User::where('id', $user_id)
            ->firstOrFail();
        $posts = Post::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.show', ['user' => $user], ['posts' => $posts]);
    }

    public function edit()
    {
        $user = Auth::user();

        return view('user.edit')->with([
            'message' => '',
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {

        $validate_rule = [
            'name' => 'required|string|max:20',
            'university' => 'required|string',
            'email' => 'required|email',
            'profile_image' => 'max:10240|mimes:jpeg,gif,png'
        ];
        $this->validate($request, $validate_rule);

        $user = User::find($request->id);
        bcrypt($request->get('new-password'));

        $user->name = $request->name;
        $user->email = $request->email;
        $user->university = $request->university;
        $user->profile = $request->profile;
        $user->sex = $request->sex;
        if ($request->profile_image != null) {
            $user_image = $request->file('profile_image');
            $path = Storage::disk('s3')->put('user_images', $user_image, 'public');
            $user->profile_image = Storage::disk('s3')->url($path);
        }
        $user->save();

        return view('user.edit')->with([
            'message' => '更新完了',
            'user' => $user,
        ]);
    }
    public function return()
    {
        return redirect('/user/' . Auth::user()->id);
    }

    public function news()
    {
        $user = Auth::user();

        $reactions = Reaction::where('to_user_id', $user->id)->where('status', 0)->get();


        return view('user.news')->with([
            'user' => $user,
            'reactions' => $reactions
        ]);
    }
}
