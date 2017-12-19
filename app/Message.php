<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message', 'chatroom_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
