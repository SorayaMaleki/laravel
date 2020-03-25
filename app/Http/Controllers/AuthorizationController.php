<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user=auth()->user();
        $post=Post::where('user_id',1)->first();
        if ($post->user_id==$user->id){
            dd("you can see");
        }
        else{
            dd("you can't see");
        }
    }
    public function gate(){
        $user=auth()->user();
        $post=Post::where('user_id',1)->first();
//        write in providers AuthServiceProvider in boot method
//        if (\Gate::allows("post_show",$post)){
//        if ($user->can("post_show",$post)){


//        if ($this->authorize("post_show",$post)){ //dont need else it has 403 itself
//            var_dump($post);
//        }
//        else{
//            return abort(403,'دسترسی ندارید');
//        }


 /** denies */
//dd(\Gate::denies("post_show",$post));


/** for another user */
//        $user=User::find(3);
//        $post=Post::where('user_id',1)->first();
//        dd (\Gate::forUser($user)->allows("post_show",$post));


        /** gate with class name */
//        dd (\Gate::allows("create",Post::class));
//        dd (\Gate::allows("create",user::class));

        /** test in view */
//        return view("authorization");
    }
    public function policy(){
        $user=auth()->user();
        $post=Post::where('user_id',1)->first();
//        $post=new Post();
//        dd(\Gate::allows("create",Post::class));
        dd(\Gate::allows("create",$post));
    }
}
