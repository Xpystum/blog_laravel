<?php

namespace App\Modules\User\Domain\Async\Event;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageAcceptListener implements ShouldBroadcast
{
    use SerializesModels;

    public function __construct(
        public int $messagePersonalId,
    ) {}


    public function broadcastOn(): array
    {
        return [
            new Channel('message'),
        ];
    }

    // Дополнительно можно задать псевдоним для события
    public function broadcastAs()
    {
        return 'message.event';
    }

}
