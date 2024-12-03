<?php

namespace App\Modules\Email\Domain\Notifications;

use App\Modules\Email\Domain\Models\EmailAccesToken;
use App\Modules\User\Domain\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Отправка почты для подтврждения email
 */
class EmailAccesTokenSendNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private EmailAccesToken $email,
    ) { }


    public function via(User $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(User $notifiable): MailMessage
    {
        $url = route("email.confirm", ['emailAccesToken' => $this->email->uuid]);

        return (new MailMessage)
            ->subject('Подтверждения Почты')
            ->greeting('Здравствуйте!')
            ->line('Для подтверждения почты, перейдите по ссылке снизу:')
            ->action('Подтвердить почту', $url);
    }


}
