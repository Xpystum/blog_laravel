<?php

namespace App\Modules\User\Domain\Async\Event;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendMessagePersonalEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $messagePersonalId;

    public function __construct($messagePersonalId)
    {
        $this->messagePersonalId = $messagePersonalId;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('message');
    }

      public function broadcastAs()
    {
        return 'my-event';
    }

}
