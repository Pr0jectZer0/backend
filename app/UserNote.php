<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserNote extends Model
{
    protected $fillable = ['id_user', 'id_notiz', 'rolle'];

    protected $table = 'user_notiz';

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

    public function note()
    {
        return $this->belongsTo('App\Note', 'id_notiz', 'id');
    }
}
