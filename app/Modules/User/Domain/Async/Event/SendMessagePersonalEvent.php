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

    public int $chatPersonalId;
    public string $messageTextarea;

    public function __construct(int $chatPersonalId, string $messageTextarea)
    {
        $this->chatPersonalId = $chatPersonalId;
        $this->messageTextarea = $messageTextarea;
    }

    public function broadcastOn(): Channel
    {
        return new Channel('message');
    }

      public function broadcastAs()
    {
        return 'message-private-event';
    }

}
