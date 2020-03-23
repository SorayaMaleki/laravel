<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index1(){
        $user=auth()->user();
        $post=Post::where('user_id',1)->first();
        if ($post->user_id==$user->id){
            dd("you can see");
        }
        else{
            dd("you can't see");
        }
    }
    public function index(){

    }
}
