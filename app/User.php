<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
//        return Profile::where('user_id', $this->id)->first();
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
//        return Post::where('user_id', $this->id)->get();
    }

    public function scopeLastPosts($query, $minuts = 5)
    {
        $time = Carbon::now()->subMinutes($minuts);
        return $this->posts()->where('created_at', '>=', $time);
    }

    public function rates()
    {
        return $this->morphMany(Rate::class, 'rateable');
    }

    public function isAdmin()
    {
        return $this->id === 1;
    }

    public function generateToken()
    {
        $token = str_random(50);
        $this->api_token = $token;
        $this->save();
        return $token;
    }

    public function logOut()
    {
        $this->api_token = null;
        $this->save();
        return $this;
    }
}
