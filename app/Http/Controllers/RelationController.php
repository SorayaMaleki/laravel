<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

class RelationController extends Controller
{

    public function rel($id = 1)
    {
/** one to one relation */
        $user = User::find($id);
//        $result = $user->profile()->first();
//        $result = $user->profile;


/**one to many relation */

//        $posts = Post::where('user_id', $user->id)->get();
//        $posts = $user->posts();
//        $result = $user->posts()->get();
//        $result = $user->posts()->where('body', 'like', 'Quia%')->get();

//          $result = $user->posts;

/** many to many relation */
//        $post=Post::find($id);
//        $tags=$post->tags;

//        $result = $user->posts()->where('updated_at', '>', '2018-10-07 15:06:32')->get()->toArray();
//        $result = $user->lastPosts(40)->get()->toArray();

/**  additional */
        $result=User::has('posts')->get();
        $result=User::has('posts','>=',5)->get();
        $result=User::whereHas('posts',function ($query){
           $query->where('title','like','%am%');
        })->get();

//        $result = User::doesntHave('posts')->get();
//        $result = User::whereDoesntHave('posts', function ($query){
//            $query->where('title', 'like', '%Amet%');
//        })->get();


        $result=User::withCount('posts')->get();
        $result=User::withCount('posts as m')->get();

        $result=User::with('profile')->get();
        $result = User::with('profile:user_id,age,height,bio')->get();


//        $result[0]->profile;
//        if ($id==1){
//            $result->load('profile');
//            $result->loadMissing('profile');
//        }

        $result = User::with(['profile' => function($query){
            $query->where('age', '>', 52);
        }])->get();

        dd($result);

    }

    public function userprofile($id){
/** save and update ane to one relation */

//        $user = User::find($id);
//        $user->profile()->delete(); dd('hazf shod');
//        $profile = new Profile(['age' => 18, 'height' => 180, 'bio'=>'nothing...!']);
//        $profile->user_id = $user->id;
//        $profile->save();
//        $user->profile()->save($profile);

//        $user->profile()->update(['bio' => 'updated bio...']);
//        $user->profile->update(['bio' => 'updated bio...']);

//        $result = $user->profile;



        $profile = new Profile(['age' => 18, 'height' => 180, 'bio'=>'nothing...!']);
        $user = new User([
            'name' => 'foooo',
            'email' => 'foooddsss@bar.com',
            'password' => bcrypt('123456'),
        ]);
        $user->save();
        $profile->user()->associate($user);
        $result = $profile->save();

        dd($result);
        return $result;
    }

    function userposts($id){
/** save and update one to many relation */

        $user = User::find($id);

//        $result = $user->posts;

//        $post = new Post(['title' => 't2', 'body' => 'b2']);
//        $post->user_id = $user->id;
//        $result = (string)$post->save();
//        $result = $user->posts()->save(new Post(['title' => 't', 'body' => 'b']));

//        $result = $user->posts()->saveMany([
//            new Post(['title' => 'post1', 'body' => 'post1 body']),
//            new Post(['title' => 'post2', 'body' => 'post2 body']),
//            new Post(['title' => 'post3', 'body' => 'post3 body']),
//        ]);

        $user->posts[0]->title = 'foo';
        $user->posts[1]->title = 'bar';
        $result = $user->push();

            $post = new Post(['title' => 'post1', 'body' => 'post1 body']);
            $post->user()->associate($user);
            $post->save();
            $result = $post;

        return $result;
    }

}
