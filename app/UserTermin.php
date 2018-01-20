<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTermin extends Model
{
    protected $fillable = ['id_user', 'id_termin', 'status'];

    protected $table = 'user_termin';

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function date()
    {
        return $this->belongsTo('App\Termin', 'id_termin', 'id');
    }
}
