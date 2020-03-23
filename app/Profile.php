<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'age', 'height', 'bio'];
//    public function __construct()
//    {
//        $this->middleware('auth');
        //        $this->>middleware('is.active');
        //        $this->>middleware('role:Admin');
//    }



    public function user()
    {
        return $this->belongsTo();
    }
}
