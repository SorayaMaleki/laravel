<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     protected $fillable=[
        'title','description','post_id'
    ];
    public function post(){
        return $this->belongsTo('App\Post');
    }
    public function likes(){
        return $this->morphMany('App\Like', 'likeable');
    }
}
