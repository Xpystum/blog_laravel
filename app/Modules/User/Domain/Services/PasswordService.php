<?php

namespace App\Modules\User\Domain\Services;

use App\Modules\Base\Response\FunctionResult;
use App\Modules\Email\App\Data\Enums\EmailStatusEnum;
use App\Modules\User\App\Data\Enums\PasswordResetStatusEnum;

use App\Modules\User\Domain\Async\Event\SendPasswordVerifEvent;

use App\Modules\User\Domain\Models\PasswordReset;
use Illuminate\Support\Facades\DB;

class PasswordService
{
    /**
     * Отправка сообщения на почту через очередь (для восстановления пароля)
     * @param int $user_id
     *
     * @return bool
     */
    public function send(int $user_id) : bool
    {
        //отправляем логику работы отправки в событие
        SendPasswordVerifEvent::dispatch($user_id);

        return true;
    }

    public function confirmReset(
        PasswordReset $password,
        string $password_value,
    ) : FunctionResult {
        /**
        * @var User
        */
        $user = $password->user;

        if($password->status === PasswordResetStatusEnum::completed || $password->status === PasswordResetStatusEnum::expired ) { return FunctionResult::error("Данная ссылка для сброса пароля, уже была использована или не актуальна!"); }

        $passwordAcces = PasswordReset::where('user_id', $user->id)
                        ->latest()
                        ->lockForUpdate()
                        ->first();

        //провереям акутальность ссылки
        if($passwordAcces->id !== $password->id) { return FunctionResult::error("Данная ссылка для подтверждения уже не актуальна!"); }

        //проверяем актуальное время для смены пароля (Время указана в миграции)
        if($passwordAcces->expires_at < now()) {


            dd($passwordAcces->expires_at , now());

            $password->status = PasswordResetStatusEnum::expired;
            $password->save();

            return FunctionResult::error("Время для смены пароля по данной ссылки истекло!");
        }

        try {

            #TODO Обязательна ли тут транзакция?
            DB::transaction(function () use ($user, $password_value, $password) {

                $user->password = $password_value;
                $user->save();

                $password->status = PasswordResetStatusEnum::completed;
                $password->save();

            });

            return FunctionResult::success('Пароль успешно изменён.');

        } catch (\Exception $e) {

            logError($e , ['Ошибка в сервисе PasswordService в методе confirmReset']);
            throw new \Exception('Произошла ошибка при изменения пароля.', 500, $e);
        }
    }
}
