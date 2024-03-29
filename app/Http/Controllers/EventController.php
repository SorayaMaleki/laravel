<?php

namespace App\Http\Controllers;

use App\Events\RegisterUser;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function crateUser(Request $request)
    {
        //کابر ایجاد بشه
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        event(new RegisterUser($user));
//        $php artisan make event:generate
//        make events from EventServiceProvider;

//        for insert/delete/update/... models we can use obsever
//        $php artisan make:observer -m User
//        we must register observer in providers
//        $php artisan make:provider EloquentObserverServiceProvider
//        register provider in app/config
        return response($user, 201);
    }
}
