<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class TopController extends Controller
{
    public function top()
    {
        $posts = Post::limit(9)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('top',['posts' => $posts]);
    }
}
