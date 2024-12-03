<?php

namespace App\Modules\User\Async\Event;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendPasswordVerifEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public function __construct(
        public int $user_id,
    ) { }

}
