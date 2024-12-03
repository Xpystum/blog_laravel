<?php

namespace App\Modules\User\Async\Listeners;

use App\Modules\User\App\Repositories\PasswordRepository;
use App\Modules\User\App\Repositories\UserRepository;
use App\Modules\User\Async\Event\SendPasswordVerifEvent;
use App\Modules\User\Domain\Models\User;
use App\Modules\User\Domain\Notifications\PasswordSendNotification;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordVerifListener implements ShouldQueue
{

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

        $passwordReset = $this->passRep->create($user);

        //Вызываем нотификацию (нету смысл это вызывать в очереди)
        $user->notify(new PasswordSendNotification($passwordReset));
    }

}
