<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PaginationController extends Controller
{
    public function index($id){
        $user=User::find($id);
        $posts=$user->posts()->paginate(5);
        return view('pagination',compact('user','posts'));
    }
}
