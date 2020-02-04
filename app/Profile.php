<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function __construct()
    {
//        $this->middleware('auth');
        //        $this->>middleware('is.active');
        //        $this->>middleware('role:Admin');
    }

    protected $fillable = ['user_id', 'age', 'height', 'bio'];

    public function user()
    {
        return $this->belongsTo();
    }
}
