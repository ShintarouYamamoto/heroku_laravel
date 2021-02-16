<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{
    Public function user()
    {
      return $this->belongsTo('App\User','user_id','id');
    }

    Public function chatroom()
    {
      return $this->belongsTo('App\Chatroom','chat_room_id','id');
    }
}
