<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MutatorController extends Controller
{
    //    public function rel($id = 1)
//    {
//        $user = User::find($id);
//
//        $result = $user->first_name;
////        $result = $user->firstname;
////        $result = $user->firstName;
////        $result = $user->email_provider;
////        $result = $user->name;
//
//        dd($result);
//    }

//    public function rel($id = 1)
//    {
//        $user = User::find($id);
//
//        $user->first_name = 'sayad';
//
//        dd($user->getAttributes());
//    }

    public function index($id = 1)
    {
        $post = Post::withTrashed()->find($id);
        $post->deleted_at = date('Y-m-d h:i:s');
        $post->body = ['a', 'b', 'c'];
        $post->save();

        dd($post->getAttributes());
        dd($post->deleted_at);
    }
}

