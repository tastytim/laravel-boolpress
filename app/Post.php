<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'body', 'thumb','user_id','category_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }


    public function tags(){
        return $this->belongsToMany('App\Tag');
    }


    public function comments(){
        return $this->belongsToMany('App\Comment');
    }
}
