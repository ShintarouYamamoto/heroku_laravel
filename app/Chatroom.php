<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    public function chatusers()
    {
        return $this->hasMany('App\ChatUser', 'chat_room_id', 'id');
    }

    public function chatmessages()
    {
        return $this->hasMany('App\ChatMessage', 'chat_room_id', 'id');
    }

    public function chatId()
    {
        return $this->hasOne('App\Chatroom', 'post_id', 'post_id');
    }
}
