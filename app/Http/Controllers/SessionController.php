<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function access(Request $request){
        if($request->session()->has('name')){
            echo $request->session()->get('name');
        }
        else{
            echo 'no data stored';
        }
    }
    public function store(Request $request){
        $request->session()->put('name','afrf');
        echo 'data added';

    }
    public function delete(Request $request){
        $request->session()->forget('name');
        echo 'data deleted';

    }
}
