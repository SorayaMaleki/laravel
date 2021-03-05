<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Post::class=> PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        Passport::tokensExpireIn(now()->addDay(1));
        Passport::refreshTokensExpireIn(now()->addDay(30));
//        Gate::before(function ($user,$ability,$param){
////           dd(func_get_args());
//            /** use for example give all access to user 1(admin or developers) like see all posts */
//            if ($user->id===2){
//                return true;
//            }
//        });


//        Gate::after(function ($user,$ability,$result,$param){
//            /** use for example log result */
//        });

        Gate::define("post_show",function ($user,$post=null){
            return $user->id ===$post->user_id;
        });

        Gate::define("create",function ($user,$model){
            if ($model===User::class){
                if ($user->id===1) {return true;}
            }
            elseif ($model===Post::class){
                if ($user->id===2) {return true;}
            }
            return false;
        });
        Gate::define("is-admin",function ($user){
            return $user->isAdmin();
        });
    }
}
