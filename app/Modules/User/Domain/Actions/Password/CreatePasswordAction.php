<?php

namespace App\Modules\User\Domain\Actions\Password;

use App\Modules\User\Domain\Models\PasswordReset;
use App\Modules\User\Domain\Models\User;
use Exception;

class CreatePasswordAction
{

    /**
    * @param User $dto
    *
    * @return PasswordReset
    */
    public static function make(User $data) : PasswordReset
    {
        return (new self)->run($data);
    }

    /**
     * @param User $data
     *
     * @return ?PasswordReset
     */
    public static function run(User $user) : PasswordReset
    {
        try {

            $passwordReset = PasswordReset::query()->create([
                'value_email' => $user->email,
                'user_id' => $user->id,
            ]);

            return $passwordReset;

        } catch (\Throwable $th) {

            logError($th, ['Ошибка при создании PasswordReset в CreatePasswordAction.']);
            throw new Exception('Ошибка при создании PasswordReset в CreatePasswordAction.', 500);

        }
    }

}
