<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = "spiele";
    protected $fillable = ['id_genre', 'id_publisher', 'name', 'beschreibung', 'created_at', 'updated_at'];

    public function genre(){
        return $this->belongsTo('App\Genre');
    }

    public function publisher(){
        return $this->belongsTo('App\Publisher');
    }
}
