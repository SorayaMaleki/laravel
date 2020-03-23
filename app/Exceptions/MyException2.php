<?php
namespace App\Exceptions;
//هندل کردن خطاها
use Exception;
use Illuminate\Support\Facades\Log;

class MyException2 extends Exception
{
    public function report()
    {
        return log::error("khata 2");

    }

    public function render()
    {
        return Response()->view('myError',['message'=>"my error2"]);
    }
}
