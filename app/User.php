<?php

namespace App;

use Cartalyst\Sentinel\Users\EloquentUser as SentinelUser;

use Sentinel;

class User extends SentinelUser
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable=[
         'photo_id',
         'username',
         'phone_number',
         'email',
         'password',
         'last_name',
         'first_name',
    ];

    protected $loginNames = ['email'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function scopeAll($query){
        return Sentinel::getUserRepository()->get();
    }

    public function photo(){
       return $this->belongsTo('App\Photo');
    }
    public function posts(){
        return $this->hasMany('App\Post');
    }

}
