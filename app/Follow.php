<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    Public function followingId()
    {
      return $this->belongsTo('App\User','following_id','id');
    }
    Public function followersId()
    {
      return $this->belongsTo('App\User','followed_id' ,'id');
    }
}
