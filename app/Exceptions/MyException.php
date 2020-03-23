<?php
namespace App\Exceptions;
//هندل کردن خطاها
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MyException extends Exception
{
    public function report()
    {
        return log::error("khata 1");
    }

//    public function render(...$arg) //نمایش ورودی های فانکشن
    public function render(Request $request)
    {
//        dd($arg);
//        dd(func_get_args());
        return Response()->view('myError',['message'=>"my error1"]);
    }
}
