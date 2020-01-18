<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table="users";
    protected $fillabe=['name','birthday','major','resume_name'];
    public $timestamps =false;

}
   