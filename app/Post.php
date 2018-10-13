<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=[
        'title',
        'img_id',
        'user_id',
        'content',
        'status',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photo(){
        return $this->belongsTo('App\Photo' , 'img_id');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

}
