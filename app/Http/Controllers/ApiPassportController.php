<?php

namespace App\Http\Controllers;

use App\Http\Requests\login\LoginRequest;
use App\Http\Requests\posts\CreatePostRequest;
use App\Http\Requests\posts\UpdatePostRequest;
use App\Http\Requests\users\CreateUserRequest;
use App\Http\Requests\users\UpdateUserRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostResourceCollection;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;
use App\Post;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\Passport;

class ApiPassportController extends Controller
{
//  run composer require laravel/passport to install

//  run php artisan migrate:refresh to make oauth tables

//  run php artisan db:seed

//  run php artisan passport:install

    /* register passport in app/provider/AuthServiceProvider in boot
     write Passport::routes()*/

//  run php artisan route:list to see oauth route to work with them

    /* to use of passport must change api from token to passport in config/auth
    'api' => [
    'driver' => 'token',
    'provider' => 'users',
    ],
    change to
    'api' => [
    'driver' => 'passport',
    'provider' => 'users',
    ],
    */

//    use HasApiTokens; in user model

//in postman more ever username and password must send extra data
/*{
"username":"user1@webamooz.net",
"password": "123456",
"grant_type":"password",
"client_id": 2,
"client_secret":"czd3b9rcWuv3S55yHZ49Fg08w1nBLno3vDGzhdHw",   //secret field in oauth_clients table
}*/

//for use without send user and pass for when token expired
/*{
"client_id": 2,
"client_secret":"czd3b9rcWuv3S55yHZ49Fg08w1nBLno3vDGzhdHw",
"grant_type":"refresh_token",
"refresh_token": "def50200e4adac50bedfd7f886e5884211293788929117ebc1b4cebb88ef3c32c9051df526072bed99be46b8e9487a4d78668b35ed10d1cbd44bb6e61fed6a4b7c62883cd3d4766c399ee494178624187b1e01bd4377870f8cd696f843be55625c045d4401ad78bae2bfe01bdd87e15f5f37cfcab21c0e99cdab0df3e1d1c284b108c23966f61d6871f393daf7eff838f731a0096f23c302f08af4f19851658bb8a8dccb50b9a5c9c2be4b76db7af4f9ede40de2a52fe47e5bb695464bd2b87db204b592dc6ea28d4ea39ce6ef52cd1ae3b45dd4eb84b1b125e903f8a66a16270a0e2ef595f502000903c8f20f10998c5a441f9e7ccece6451a6f75eed5958fda2f96ca45123a9294a93fd9ed03080d4aa3e360dd3457695d702d67ea30b9e7de9111392a7ec0cbd44db527aad5401e5737f651515587739449a91946960c00c88e3a79a6ae1baf93e6778ba70a666b9e559b44497a0bf645856af016c99ade17f"
}*/

//we set expire time in app/provider/AuthServiceProvider
//زمان اکسپایر فقط برای مدل اصلی ست می شود و برای Personal Access کارایی ندارد
//Passport::tokensExpireIn(now()->addDay(1));
//Passport::refreshTokensExpireIn(now()->addDay(30));

//Personal Access:
/*public function loginApi(LoginRequest $request)
    {
        auth()->attempt([
            'email' => $request->username,
            'password' => $request->password,
        ]);
        if (auth()->check()) {
            $token = auth()->user()->createToken('password-for-user-' . auth()->id());
            return response([
                'token' => $token->accessToken
            ]);
        }
        return response([
            'error' => 'اطلاعات کاربری اشتباه وارد شده است'
        ], 401);
    }
    */
}
