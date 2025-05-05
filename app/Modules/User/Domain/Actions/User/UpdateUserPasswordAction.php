<?php

namespace App\Modules\User\Domain\Actions\User;

use App\Modules\User\Domain\Models\User;
use App\Modules\Base\Errors\ActionException;

class UpdateUserPasswordAction
{


    public static function make(User $user, string $password) : bool
    {
        return (new self)->run($user, $password);
    }


    public static function run(User $user, string $password) : bool
    {
        try {

            $model = $user->update([
                "password" => $password,
            ]);

            return $model;

        } catch (\Throwable $th) {

            $nameClass = self::class;

            logError("Ошибка в {$nameClass} при создании записи: " . $th);
            throw new ActionException('Ошибка в классе: ' . $nameClass, 500);

        }
    }

}
