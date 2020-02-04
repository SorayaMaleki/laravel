<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(env('DB_STRING_LENGTH', 255));
//        Schema::enableForeignKeyConstraints();

        //
        if (env('LOG_QUERIES') === true) {
            DB::listen(function ($query) {
                Log::debug($query->sql, [
                    'bindings' => $query->bindings,
                    'time' => $query->time
                ]);
            });
        }
        Relation::morphMap([
            'user' => User::class,
            'post' => Post::class,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
