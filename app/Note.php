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

}
