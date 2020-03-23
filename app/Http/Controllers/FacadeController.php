<?php

namespace App\Http\Controllers;

use App\Test\FooFacade;
use App\Test\FooFacade1;
use Illuminate\Http\Request;
//use Facades\App\Test\Foo;
class FacadeController extends Controller
{
    /** to call methods that aren't static */
    public function index()
    {
//
//        $name1 = FooFacade::harchi('sayad', 28);
//        $name2 = FooFacade::harchiz('sayad', 28);
//        dd($name1, $name2);
        $name = FooFacade::getName();
        dd($name);
    }

}
