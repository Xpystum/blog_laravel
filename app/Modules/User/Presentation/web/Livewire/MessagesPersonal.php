<?php

namespace App\Modules\User\Presentation\web\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Modules\User\Domain\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class MessagesPersonal extends Component
{
    public Collection $messages;
    public User $userAuth;
    public User $userOther;
    public int $chatPersonalId;

    public function mount(
        User $userAuth,
        User $userOther,
        int $chatPersonalId,
        $messages,
    ) {

        $this->userAuth = $userAuth;
        $this->userOther = $userOther;
        $this->chatPersonalId = $chatPersonalId;
        $this->messages = $messages;
    }

    #[On('echo:message,.my-event')]
    public function notifyNewMessage($eventData)
    {
        dd($eventData);
        // Здесь $eventData будет содержать данные, переданные в событии SendMessagePersonalEvent
    }

    public function render()
    {
        return view('livewire.Message.MessagesPersonal');
    }
}
