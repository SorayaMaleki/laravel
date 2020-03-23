<?php
//toye file config/app bayad autoload beshan
//aval register badboot call mishe
namespace App\Providers;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class DbServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        alt + crtl + M
        $this->getDefaultStringLength();

        $this->logQueries();

        $this->getMorphMap();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function getDefaultStringLength(): void
    {
        Schema::defaultStringLength(env('DB_STRING_LENGTH', 255));
//        Schema::enableForeignKeyConstraints();
    }

    protected function logQueries(): void
    {
        if (env('LOG_QUERIES') === true) {
            DB::listen(function ($query) {
                Log::debug($query->sql, [
                    'bindings' => $query->bindings,
                    'time' => $query->time
                ]);
            });
        }
    }

    protected function getMorphMap(): void
    {
        Relation::morphMap([
            'user' => User::class,
            'post' => Post::class,
        ]);
    }
}
