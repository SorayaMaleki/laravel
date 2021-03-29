<?php

namespace App\Providers;

use App\Connection\DbConnection;
use App\Connection\MysqlConnection;
use App\Connection\SqliteConnection;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class ConnectionServiceProvider extends ServiceProvider
{
    // به تعویق انداختن باندینگ
    protected $defer = true;

    public $singletons = [
        DbConnection::class => SqliteConnection::class,
//        DbConnection::class => MysqlConnection::class,
    ];

    public $bindings = [
//        DbConnection::class => SqliteConnection::class
    ];


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(User $u)
    {
        dd($u);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->singleton(DbConnection::class, SqliteConnection::class);
//        app()->bind(DbConnection::class, SqliteConnection::class);
//        app()->singleton(D bConnection::class, function(){
//            return new Foo('xyz');
//        });

//        $this->app->bind(DbConnection::class, function(){
//            $connection = new SqliteConnection();
//            $connection->create();
//            return $connection;
//        });

//        $connection = new SqliteConnection();
//        $this->app->instance(DbConnection::class, $connection);

//        $this->app->when(HomeController::class)
//            ->needs('$name')
//            ->give('sayad aazami');

//        $this->app->when(\App\Connection\User::class)
//            ->needs(DbConnection::class)
//            ->give(SqliteConnection::class);



//        $this->app->resolving(function($obj, $app){
//            var_dump(get_class($obj));
//        });

//        $this->app->resolving(\App\Connection\User::class, function ($obj, $app){
//            dd('user: ', $obj);
//        });
    }

    public function provides()
    {
        return [
            DbConnection::class,
        ];
    }
}
