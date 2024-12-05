<?php

namespace App\Modules\User\Domain\Services;

use App\Modules\User\Async\Event\SendPasswordVerifEvent;

class PasswordService
{
    /**
     * Отправка сообщения на почту через очередь (для восстановления пароля)
     * @param int $user_id
     *
     * @return bool
     */
    public function send(int $user_id)
    {
        //отправляем логику работы отправки в событие
        SendPasswordVerifEvent::dispatch($user_id);

        return true;
    }

    public function confirmReset()
    {
        
    }
}
