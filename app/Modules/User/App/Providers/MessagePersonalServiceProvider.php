<?php

namespace App\Modules\User\App\Providers;

use App\Modules\User\Domain\Async\Event\MessageAcceptListener;
use App\Modules\User\Domain\Async\Event\SendMessagePersonalEvent;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

/**
 * Класс при работе с личными сообщениями пользователя
 */
class MessagePersonalServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Event::listen(
        //     SendMessagePersonalEvent::class,
        //     MessageAcceptListener::class,
        // );
    }
}


