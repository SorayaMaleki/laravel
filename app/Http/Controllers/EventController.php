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
//        php artisan make event:generate
//        make events from EventServiceProvider;

        return response($user, 201);
    }
}
