<?php

namespace App\Modules\User\Presentation\web\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Modules\User\Domain\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\User\Domain\Async\Event\SendMessagePersonalEvent;
use App\Modules\User\Domain\Models\ChatPersonal;
use App\Modules\User\Domain\Models\MessagePersonal;

class MessagesPersonal extends Component
{

    public ?string $messageTextarea;

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

    #[On('echo:message,.message-private-event')]
    public function notifyNewMessage($array)
    {
        if(
            isset($array['chatPersonalId']) && !empty($array['chatPersonalId'])
            && isset($array['messageTextarea']) && !empty($array['messageTextarea']))
        {
            $chatPersonalId = $array['chatPersonalId'];
            $messageTextarea = $array['messageTextarea'];

            $message = MessagePersonal::create([
                'chat_personal_id' => $chatPersonalId,
                'user_id' => $this->userAuth->id,
                'message' => $messageTextarea,
            ]);

            $this->messages->push($message);
        }

    }

    public function sendMessage()
    {
        //валидируем данные textarea
        $this->validateMessageTextarea();

        SendMessagePersonalEvent::dispatch($this->chatPersonalId, $this->messageTextarea);

        //затираем значения
        $this->messageTextarea = '';
    }

    public function render()
    {
        return view('livewire.Message.MessagesPersonal');
    }

    public function validateMessageTextarea()
    {

        try {

            $validated = Validator::make(
                ['messageTextarea' => $this->messageTextarea],
                [
                    'messageTextarea' => ['required', 'string', 'max:1000']
                ],
                [
                    'required' => "Для отправки введите сообщения.",
                    'string' => "Сообщение для отпраки должна быть строчного типа.",
                    'max' => "Максимальное количество символов не больше 1000.",
                ]
            )->validate();


        } catch (\Illuminate\Validation\ValidationException $e) {

            $errors = $e->errors();
            // Если вы хотите получить сообщение только для определенного поля
            $specificError = $errors['messageTextarea'][0] ?? 'Нет ошибки';

            $this->js("alert('$specificError!')");

            //костыль - что бы выкинуть ошибку
            $validated = Validator::make(
                ['messageTextarea' => $this->messageTextarea],
                [
                    'messageTextarea' => ['required', 'string', 'max:1000']
                ],
                [
                    'required' => "Для отправки введите сообщения.",
                    'string' => "Сообщение для отпраки должна быть строчного типа.",
                    'max' => "Максимальное количество символов не больше 1000.",
                ]
            )->validate();

        }

    }
}
