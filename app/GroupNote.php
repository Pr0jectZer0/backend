<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupNote extends Model
{
    protected $fillable = ['id_gruppe', 'id_notiz'];

    protected $table = 'gruppe_notiz';

    public function group()
    {
        return $this->belongsTo('App\Group', 'id_gruppe', 'id');
    }

    public function note()
    {
        return $this->belongsTo('App\Note', 'id_notiz', 'id');
    }
}
