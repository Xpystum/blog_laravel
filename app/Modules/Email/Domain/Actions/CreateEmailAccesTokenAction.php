<?php

namespace App\Modules\Email\Domain\Actions;

use App\Modules\Email\Domain\Models\EmailAccesToken;
use Exception;

class CreateEmailAccesTokenAction
{
    /**
     * Получаем user_id и email
     * @param int $user_id
     * @param string $email_value
     *
     * @return EmailAccesToken
     */
    public static function make(int $user_id, string $email_value) : EmailAccesToken
    {
        return (new self)->run($user_id, $email_value);
    }


    private function run(int $user_id, string $email_value) : EmailAccesToken
    {
        try {

            return EmailAccesToken::create([
                'value' => $email_value,
                'user_id' => $user_id,
            ]);

        } catch (\Throwable $th) {

            logError($th, ['Ошибка при создании EmailAccesToken в CreateEmailAccesTokenAction']);
            throw new Exception('Ошибка при создании EmailAccesToken в CreateEmailAccesTokenAction', 500);

        }

    }
}
