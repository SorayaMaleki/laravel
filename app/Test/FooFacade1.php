<?php
namespace App\Test;


class FooFacade1{
    public static function __callStatic($method, $params=[])
    {
        if (method_exists(XYZ::class, $method)){
            $obj = new XYZ();
            return call_user_func_array([$obj, $method], $params);
        }

        dd("method {$method} not exists!");
    }
}

class XYZ{
    public function harchi($name, $age)
    {
        return "user name: {$name}, age: {$age}";
    }

    public function harchiz()
    {
        return 'salam az harchiz vajebtare';
    }
}
