<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Termin extends Model
{
    protected $table = 'termin';

    protected $fillable = ['id_user', 'titel', 'beschreibung', 'end_datum', 'start_datum'];

    public function user(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function groups()
    {
        return $this->hasMany('App\GroupTermin', 'id_termin', 'id');
    }

    public function shared(){
        return $this->hasMany('App\UserTermin', 'id_termin', 'id');

        //return $this->hasManyThrough('App\User', 'App\UserNote', 'id_notiz', 'id', 'id');
    }
}
