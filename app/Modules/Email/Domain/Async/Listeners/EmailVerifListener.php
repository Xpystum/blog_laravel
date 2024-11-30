<?php

namespace App\Modules\Email\Domain\Async\Listeners;

use App\Modules\Email\Domain\Async\Events\SendEmailVerifEvent;
use App\Modules\Email\Domain\Models\EmailAccesToken;
use App\Modules\Email\Domain\Notifications\EmailConfirmationNotification;
use App\Modules\Email\Domain\Repositories\EmailAccesTokenRepository;
use App\Modules\User\Domain\Models\User;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailVerifListener implements ShouldQueue
{

    public function __construct(
        private EmailAccesTokenRepository $rep,
    ) { }


    public function handle(

        SendEmailVerifEvent $event,


    ): void {

        try {
            /**
            * @var User
            */
            $user = User::find($event->user_id);
        } catch (\Throwable $th) {
            logError($th, ['Ошибка в EmailVerifListener, не найден user по id']);
            throw new Exception('Ошибка в EmailVerifListener', 500);
        }

        /**
        * @var EmailAccesToken
        */
        $emailAccesToken = $this->rep->create($user->id, $user->email);

        //Вызываем нотификацию (нету смысл это вызывать в очереди)
        $user->notify(new EmailConfirmationNotification($emailAccesToken));
    }
}
