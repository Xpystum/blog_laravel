<?php

namespace App\Modules\Email\Domain\Async\Listeners;

use App\Modules\Email\Domain\Async\Events\SendEmailVerifEvent;
use App\Modules\Email\Domain\Models\EmailAccesToken;
use App\Modules\Email\Domain\Notifications\EmailAccesTokenSendNotification;
use App\Modules\Email\Domain\Repositories\EmailAccesTokenRepository;
use App\Modules\User\Domain\Models\User;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailVerifListener implements ShouldQueue
{

    use InteractsWithQueue;

    public $tries = 2;

    public $backoff = 3;

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

        $emailAccesToken = null;

        //Проверяем для того, что бы не создавать дополнительные записи при ошибке listener
        if($this->attempts() <= 1)
        {
            /**
            * @var EmailAccesToken
            */
            $emailAccesToken = $this->rep->create($user->id, $user->email);

        } else {

            //если listener упал в ошибку - на повторном запуске получаем уже созданную запись
            $emailAccesToken = $this->rep->findModelForArray([
                'user_id' => $user->id,
                'email_value' => $user->email,
            ]);

            is_null($emailAccesToken) ?: $this->fail('emailAccesToken при получении оказался пустым.');
        }


        //Вызываем нотификацию (нету смысл это вызывать в очереди)
        $user->notify(new EmailAccesTokenSendNotification($emailAccesToken));
    }
}
