<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['id_user', 'titel', 'text'];

    protected $table = 'notiz';

    public function user(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function groups()
    {
        return $this->hasMany('App\GroupNote', 'id_gruppe', 'id');
    }

    public function shared(){
        return $this->hasMany('App\UserNote', 'id_notiz', 'id');

        //return $this->hasManyThrough('App\User', 'App\UserNote', 'id_notiz', 'id', 'id');
    }

}
