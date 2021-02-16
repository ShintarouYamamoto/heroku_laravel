<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function chatroom()
    {
        return $this->belongsTo('App\Chatroom','chat_room_id','id');
    }
}
