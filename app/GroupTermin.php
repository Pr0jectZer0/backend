<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupTermin extends Model
{
    protected $fillable = ['id_gruppe', 'id_termin'];

    protected $table = 'gruppe_termin';

    public function group()
    {
        return $this->belongsTo('App\Group', 'id_gruppe', 'id');
    }

    public function termin()
    {
        return $this->belongsTo('App\Termin', 'id_termin', 'id');
    }
}
