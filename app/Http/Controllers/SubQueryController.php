<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class SubQueryController extends Controller
{
    public function index()
    {
//Sometimes you may need to construct a where clause that compares the
//results of a subquery to a given value

//        $users = User::addSelect(
//            ['last_post'=>
//            Post::select('title')
//                ->whereColumn('user_id','users.id')
//                ->limit(1)
//                ->latest()
//            ]
//        )->find(2);

//        $users = User::addSelect(
//            ['count_post' =>
//                Post::selectRaw('count(*)')
//                    ->whereColumn('user_id', 'users.id')
//            ]
//        )->find(2);


        $users = User::where(function ($query) {
            $query->select('title')
                ->from('posts')
                ->whereColumn('user_id', 'users.id')
                ->orderByDesc('created_at')
                ->limit(1);
        }, 'fgfg')->get();
        dd($users);
    }
}
