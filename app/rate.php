<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    protected $fillable=['rate','rateable_id','rateable_type','rateab_user_id'];

    public function rateable(){
        return $this->morphTo();
    }
}
