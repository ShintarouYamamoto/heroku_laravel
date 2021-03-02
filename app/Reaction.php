<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    public function toUserId()
    {
        return $this->belongsTo('App\User', 'to_user_id', 'id');
    }

    public function fromUserId()
    {
        return $this->belongsTo('App\User', 'from_user_id', 'id');
    }

    public function postId()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }

    public function chatId()
    {
        return $this->hasOne('App\Chatroom', 'post_id', 'post_id');
    }
}
