<?php

namespace App\Providers;

use App\Events\RegisterUser;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RegisterUser::class=>[
            '\App\Listeners\SendVerificationCodeEmail',
            '\App\Listeners\SendWelcomeEmail',
            '\App\Listeners\CallAdmin',
        ]
    ];

//    use listen or subscribe listeners
     protected $subscribe = [
    // \App\Listeners\UserSubscriber::class,
    ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        $this->customListeners();
        //
    }

    private function customListeners(): void
    {
        Event::listen(RegisterUser::class, function (RegisterUser $event) {
            Log::info('manam daram gosh midam be registere usere ' . $event->getUser()->name);
        });

//        Event::listen('Illuminate*', function ($eventName, $params) {
//            $event = array_shift($params);
//            var_dump($eventName);//, $event);
//        });

//        Event::listen('eloquent.*', function($eventName, $params){
//            $event = array_shift($params);
//            var_dump($eventName);
//        });

//        Event::listen('eloquent.saving: App\User', function($event){
//            var_dump('event [eloquent.saving: App\User] etefagh oftad');
//        });
    }
}
