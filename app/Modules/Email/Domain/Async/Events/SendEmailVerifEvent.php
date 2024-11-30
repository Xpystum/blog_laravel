<?php

namespace App\Modules\Email\Domain\Async\Events;


use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendEmailVerifEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public function __construct(
        public int $user_id,
    ) { }

}
