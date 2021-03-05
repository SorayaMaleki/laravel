<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UnittestController extends Controller
{
//package is phphunit
/*config at phpunit.xml
CACHE_DRIVER/SESSION_DRIVER/MAIL_DRIVER,... store inarray
    because its just for test
    store in file reduce speed
we have to type of tests in root/tests folder:
    1)unit(تست هر تابع به صورت مجزا)
    2)feature(تست چند تابع باهم کیک فیچر را میسازند مثل لاگین)
*/

//for run  tests in linux run ./vendror/bin/phpunit cmd
//for run  tests in windows run ./vendror/bin/.bat cmd

    public function index(){
       $message="hello ajax";
       return response()->json(['msg'=> $message]);
}
}
