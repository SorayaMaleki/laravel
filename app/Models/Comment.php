<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
//    branch1
     protected $fillable=[
        'title','description','post_id'
    ];
    public function post(){
        return $this->belongsTo('App\Models\Post');
    }
    public function likes(){
        return $this->morphMany('App\Models\Like', 'likeable');
    }
}
