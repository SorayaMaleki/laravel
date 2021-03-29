<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

class LazyCollectionController extends Controller
{
    public function index()
    {
//        to increase speed with big data

//$collect=Collection::make(range(0,10))->each(function ($item){
// dump($item);
//});
// -----15MB-----


//        $collect=Collection::make(range(0,1000000000))->each(function ($item){
//            dump($item);
//        });
//   Allowed memory size of 536870912 bytes exhausted (tried to allocate 34359738376 bytes)

//            $collect=LazyCollection::make(function (){
//                for ($i=0;$i<100000000000;$i++){
//                    yield $i;
//                }
//            })->each(function ($item){
//            dump($item);
//        });

    }

    public function cursor()
    {
        foreach (Post::where('user_id','2')->get() as $res){
          //9ms
        }

        foreach (Post::where('user_id','2')->cursor() as $flight) {
       //1ms
        }

        return view('welcome');
    }

    public function eager()
    {

//        $posts = Post::all(); // n query 570ms
        $posts = Post::with(['user'])->get(); //2 query 300ms

        foreach ($posts as $book) {
            echo $book->user->name;
        }
    }
}
