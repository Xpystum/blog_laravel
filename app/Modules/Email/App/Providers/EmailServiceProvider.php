<?php

namespace App\Modules\Email\App\Providers;

use App\Modules\Email\Domain\Async\Events\SendEmailVerifEvent;
use App\Modules\Email\Domain\Async\Listeners\EmailVerifListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

        $this->loadMigrationsFrom(dirname(__DIR__) . '/..' . '/Common' . '/Database' . "/Migrations");

        //События - Слушатели
        Event::listen(
            SendEmailVerifEvent::class,
            EmailVerifListener::class,
        );

    }
}
