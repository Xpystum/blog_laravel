<?php

namespace App\Modules\User\Domain\Notifications;

use App\Modules\Email\Domain\Models\EmailAccesToken;
use App\Modules\User\Domain\Models\PasswordReset;
use App\Modules\User\Domain\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

/**
 * Отправка почты для подтврждения email
 */
class PasswordSendNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private PasswordReset $passReset,
    ) { }


    public function via(User $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(User $notifiable): MailMessage
    {
        $url = route("password.edit", ['passwordReset' => $this->passReset->uuid]);

        return (new MailMessage)
            ->subject('Изменение пароля')
            ->greeting('Здравствуйте!')
            ->line('Для изменения пароля, перейдите по ссылке снизу:')
            ->action('Изменить пароль', $url);
    }


}
