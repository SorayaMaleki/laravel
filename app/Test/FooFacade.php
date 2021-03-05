<?php
namespace App\Test;


use Illuminate\Support\Facades\Facade;

/**
 * Class FooFacade
 *
 * @method static string getName(string $name) // to show  in FooFacade::
 *
 * @package App\Test
 */

class FooFacade extends Facade {
    protected static function getFacadeAccessor()
    {
//        return foo::class;
//        or
//        that must write singletoneinprovider
        return 'foo';

//        parent::getFacadeAccessor(); // TODO: Change the autogenerated stub
    }
}