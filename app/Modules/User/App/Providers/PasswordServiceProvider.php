<?php

namespace App\Modules\User\App\Providers;

use App\Modules\User\Async\Event\SendPasswordVerifEvent;
use App\Modules\User\Async\Listeners\PasswordVerifListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class PasswordServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Event::listen(
            SendPasswordVerifEvent::class,
            PasswordVerifListener::class,
        );
    }
}


