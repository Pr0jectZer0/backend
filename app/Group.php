<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'beschreibung'];

    protected $table = 'gruppe';

    public static function getNextGroupId()
    {
        if (self::count() == 0) {
            return 0;
        } else {
            $lastGroup = self::order_by('id_gruppe', 'desc')->first();
            return $lastGroup->id_gruppe + 1;
        }
    }

    public function users()
    {
        return $this->hasMany('App\GroupUser', 'id_gruppe', 'id');
    }

}
