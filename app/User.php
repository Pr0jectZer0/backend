<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function friends()
    {
        return $this->hasMany('App\Friend', 'id_user1')->where('status', 1);
    }

    public function friendsRequest()
    {
        return $this->hasMany('App\Friend', 'id_user2')->where('status', 0);
    }

    public function games()
    {
        return $this->hasManyThrough('App\Game', 'App\UserGame', 'id_user', 'id', 'id');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function groupMessages()
    {
        return $this->hasMany('App\GroupMessage');
    }

    public function notes()
    {
        return $this->hasMany('App\Note', 'id_user');
    }

    public function termine()
    {
        return $this->hasMany('App\Termin', 'id_user');
    }

    public function chatRooms()
    {
        return $this->hasMany('App\ChatRoom');
    }

    public function groups()
    {
        return $this->hasManyThrough('App\Group', 'App\GroupUser', 'id_user', 'id', 'id');
    }
}
