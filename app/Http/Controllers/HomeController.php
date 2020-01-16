<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        return 'webamooz.net';
    }

//    public function rel($id = 1)
//    {
//        $user = User::find($id);
////        $result = $user->profile()->first();
//        $result = $user->profile;
//        dd($user->profile->user);
//
////        $posts = Post::where('user_id', $user->id)->get();
////        $posts = $user->posts();
//
//
//
//        dd($result);
//    }

    public function rel($id = 1)
    {
        $user = User::find($id);

//        $result = $user->posts()->get();
//        $result = $user->posts()->where('body', 'like', 'Quia%')->get();
        $result = $user->posts;
        dd($result[0]->user);

        dd($result);
    }
    public function menytomenyrel($id){
        $post=Post::find($id);
        $tags=$post->tags;
        dd($tags);

    }
}
