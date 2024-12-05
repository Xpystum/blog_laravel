<?php

namespace App\Modules\User\Async\Listeners;

use App\Modules\User\App\Repositories\PasswordRepository;
use App\Modules\User\App\Repositories\UserRepository;
use App\Modules\User\Async\Event\SendPasswordVerifEvent;
use App\Modules\User\Domain\Models\User;
use App\Modules\User\Domain\Notifications\PasswordSendNotification;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PasswordVerifListener implements ShouldQueue
{

    use InteractsWithQueue;

    public function __construct(
        private UserRepository $userRep,
        private PasswordRepository $passRep,
    ) {

    }


    public function handle(
        SendPasswordVerifEvent $event,
    ): void {

        /**
         * @var User
        */
        $user = $this->userRep->find($event->user_id);

        if(is_null($user)) {

            logError('Ошибка нахождения User в PasswordVerifListener, данного user по такому id нету.');
            throw new Exception('Ошибка нахождения User в PasswordVerifListener, данного user по такому id нету.' , 500);
        }

        $passwordReset = null;

        //Проверяем для того, что бы не создавать дополнительные записи при ошибке listener
        if($this->attempts() <= 1)
        {
            /**
            * @var EmailAccesToken
            */
            $passwordReset = $this->passRep->create($user);

        } else {

            //если listener упал в ошибку - на повторном запуске получаем уже созданную запись
            $passwordReset  = $this->passRep->findModelForArray($user->id);

            is_null($passwordReset) ?: $this->fail('passwordReset при получении оказался пустым.');
        }



        //Вызываем нотификацию (нету смысл это вызывать в очереди)
        $user->notify(new PasswordSendNotification($passwordReset));
    }

}
