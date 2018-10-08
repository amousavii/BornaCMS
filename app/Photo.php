<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable=[
        'path',
    ];


    public function user(){
        $this->belongsTo('App\User');
    }

    protected $image_user = '/images/users/';

    public function getPathAttribute($photo){
        return $this->image_user .$photo;

    }

}
