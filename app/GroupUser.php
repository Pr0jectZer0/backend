<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    protected $fillable = ['id_gruppe', 'id_user', 'rolle'];

    protected $table = 'gruppe_user';

    public function group(){
        return $this->belongsTo('App\Group', 'id_gruppe', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'id_user', 'id');
    }

}
