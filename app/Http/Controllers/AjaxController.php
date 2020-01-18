<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    public function index(){
       $message="hello ajax";
       return response()->json(['msg'=> $message]);
}
}