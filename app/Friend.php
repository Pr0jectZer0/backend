<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = "freunde";

    public function user(){
        return $this->belongsTo('App\User', 'id_user1', 'id');
    }

    public function friendUser(){
        return $this->hasOne('App\User', 'id', 'id_user2');
    }
}
