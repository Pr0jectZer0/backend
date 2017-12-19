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
        return $this->hasMany('App\Friend', 'id_user1');
    }

    public function games()
    {
       return $this->hasManyThrough('App\Game', 'App\UserGame', 'id_user', 'id', 'id');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function chatRooms()
    {
        return $this->hasMany('App\ChatRoom');
    }

    public function friendList()
    {
        $friend_ids = array();

        foreach ($this->friends as $friend) {
            $friend_ids[] = $friend->id_user2;
        }

        return User::whereIn('id', $friend_ids)->get();
    }
}
