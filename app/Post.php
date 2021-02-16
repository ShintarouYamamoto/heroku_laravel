<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Post extends Model
{
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function likes()
  {
    return $this->hasMany('App\Like','post_id','id');
  }

  public function likedBy($user)
  {
    return Like::where('user_id', $user->id)->where('post_id', $this->id);
  }
  public function comments()
  {
    return $this->hasMany('App\Comment');
  }
  
  public function postId()
  {
    return $this->hasMany('App\Post', 'post_id', 'id');
  }
  
  public function reactionBy($post_id)
  {
    $post = Post::where('id',$post_id)->firstOrFail();

    return  Reaction::where('from_user_id',  Auth::user()->id)
      ->where('to_user_id', $post->user_id)
      ->where('post_id', $post_id);
  }
    public function matchBy($post_id)
    {
     
      return  Reaction::where('post_id', $post_id)->where('status', 1);
    }
}
