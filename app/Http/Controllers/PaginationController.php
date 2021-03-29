<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PaginationController extends Controller
{
    public function index($id){
        $user = User::find($id);
        $posts = $user->posts()->paginate(2);
//        $posts = $user->posts()->simplePaginate(5);

//        return $posts;
        return view('pagination', compact('user', 'posts'));
    }
}
