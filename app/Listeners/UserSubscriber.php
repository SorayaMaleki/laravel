<?php
/**
 * Created by PhpStorm.
 * User: sayad
 * Date: 2/22/2019
 * Time: 6:37 PM
 */

namespace App\Listeners;


use App\Events\RegisterUser;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Log;

class UserSubscriber
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(RegisterUser::class,'\App\Listeners\UserSubscriber@sendVerificationCodeEmail');
        $events->listen(RegisterUser::class,'\App\Listeners\UserSubscriber@sendWelcomeEmail');
        $events->listen(RegisterUser::class,'\App\Listeners\UserSubscriber@foo');
    }

    public function sendVerificationCodeEmail(RegisterUser $event)
    {
        Log::info('ارسال کد تایید به ایمیل کاربر ' . $event->getUser()->name);
    }

    public function sendWelcomeEmail(RegisterUser $event)
    {
        Log::info(' ارسال ایمیل خوش آمد گویی به ' .  $event->getUser()->name);
    }

    public function foo(RegisterUser $event)
    {
        Log::info('فراخوانی متد foo از کلاس ' . self::class);
    }
}
