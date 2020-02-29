<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class CacheController extends Controller
{
    public function index()
    {
/** made in storage/framework/cache/data */
//        Cache::put('app_name', "lara", 2); //min
//        $result = Cache::get('app_name', 'webamooz');
//        $result = Cache::get('app_name', function (){
//            return User::first();
//        });

//        if (Cache::has('app_name')) {
//            $result = Cache::get('app_name');
//        }
//        else{
//            $result = User::first();
//        }


//        Cache::put('__routes__.home@index', 0, 9999999);
//        Cache::forever('__routes__.home@index', 0);

//        $result = Cache::increment('__routes__.home@index', 2); //2ta 2ta ezafe kon
//        $result = Cache::decrement('__routes__.home@index', 3);


/** agar cache nabud meghdar default ro neshon mide va save mikone to cache */
//        $result = Cache::remember('app_name', 1, function (){
//            echo 'oumad to func';
//            return 'webamooz.net default value';
//        });


//        $result = Cache::rememberForever('app_name', function (){
//            echo 'oumad to func';
//            return 'webamooz.net default value';
//        });


 //        $key = '___app____name__';
//        Cache::forever($key, 'webamooz sayadaazami');
//        $result = Cache::get($key);
/** delete cache */
//       $result = Cache::forget($key);
 /** get value of $key then delete cache */
//        $result = Cache::pull($key);


//        Cache::put('abcd', 'ABCD', 123);
//        Cache::put('abcd2', 'ABCD2', 123);
//        $result = Cache::get('abcd2'); //result='ABCD2';


//        Cache::put('abcd', 'ABCD', 123);
//        Cache::add('abcd2', 'ABCD2', 123);
//        $result = Cache::get('abcd2'); //result='ABCD';

/** clear all cache */
//        Cache::flush();
//        $result = [Cache::get('abcd'), Cache::get('abcd2')]; //result is null

//        Cache::put('abcd', 'ABCD', 123);
//        Cache::lock('abcd', 1); not work in file/work in db
//        $result = Cache::get('abcd');

/** simple cache */
//        cache(['foo' => 50], 10);
//        dd(cache('foo', 'dsds'));
//        cache()->rememberForever();
    }
}
