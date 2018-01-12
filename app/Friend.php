<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = "freunde";

    protected $appends = ['freundschaft'];

    public function getQuantityAttribute()
    {
        if ($this->status == 0) {
            return 'angefragt';
        } else if ($this->status == 1) {
            return 'freunde';
        }
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user1', 'id');
    }

    public function friendUser()
    {
        return $this->hasOne('App\User', 'id', 'id_user2');
    }
}
