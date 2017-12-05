<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGame extends Model
{
    protected $table = 'user_spiele';

    protected $fillable = [
        'id_user', 'id_spiel', 'bewertung', 'created_at', 'updated_at'
    ];
}
