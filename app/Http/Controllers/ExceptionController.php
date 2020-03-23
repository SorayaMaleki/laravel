<?php

namespace App\Http\Controllers;

use App\Exceptions\FooException;
use App\Exceptions\MyException;
use App\Exceptions\MyException2;
use Illuminate\Http\Request;

class ExceptionController extends Controller
{
    public function index(){
//        throw new MyException('khata alaki');
//        throw new MyException2('khata alaki');

/** dont show error but log it */
//        try {
//            throw new FooException('foo exception');
//        }
//        catch (FooException $ex){
//            report($ex); //write to log
//        }
//        return "salam";


/** http exception */
//        abort(404,'404 error');
//        abort(401,'401 error'); //make 401.blade.php in views/errors
//        abort(300,'300 error'); //make 300.blade.php in views/errors
    }
}
