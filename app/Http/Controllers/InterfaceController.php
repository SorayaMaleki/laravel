<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

interface DbConnection
{
    public function connect();

    public function query($query);
}

class MysqlConnection implements DbConnection
{
    public function connect()
    {
        echo "mysql connect<br/>";
    }

    public function query($query)
    {
        // TODO: Implement query() method.
        echo "mysql query is:" . $query;
    }
}

class SqliteConnection implements DbConnection
{

    public function connect()
    {
        echo "Sqlite connect<br/>";
    }

    public function query($query)
    {
        // TODO: Implement query() method.
        echo "Sqlite query is:" . $query;
    }

}

class DatabaseConsumer
{
    private $provider;

    public function __construct(DbConnection $connection)
    {
//        var_dump($connection);
        $this->provider = $connection;
        $this->provider->connect();
    }

    public function query($query)
    {
        $this->provider->query($query);
    }
}

class InterfaceController extends Controller
{

    public function index()
    {
//         $connection = new MysqlConnection();
        $connection = new SqliteConnection();
////        $connection = new DbConnection(); // این نمیشه اصلا خطا میده چرا؟ چون نمیشه از روی interface ما بیایم نیو بکنیم
////        $connection = new Foo('sayad aazami'); // خطا میده چرا؟ چون ورودی باید کلاسی باشه که حتمن اون اینترفیس رو ایمپلمنت کنه

        $dc = new DatabaseConsumer ($connection);
        $dc->query("SELECT * FROM `posts`");
    }
}

/** ya az raveshe zir */
/** ya to appServiceProvider method register */
//        $this->app->singleton(DbConnection::class, SqliteConnection::class);
app()->bind(DbConnection::class, SqliteConnection::class);
//        app()->singleton(DbConnection::class, function(){
//            return new Foo('xyz');
//        });
