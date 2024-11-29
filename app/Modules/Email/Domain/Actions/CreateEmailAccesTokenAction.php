<?php

namespace App\Modules\Email\Domain\Actions;

use App\Modules\Email\Domain\Models\EmailAccesToken;
use Exception;

class CreateEmailAccesTokenAction
{
    public static function make(int $user_id, string $email_value) : EmailAccesToken
    {
        return (new self)->run();
    }


    public function run() : EmailAccesToken
    {
        try {

            $emailAccesToken = EmailAccesToken::create([

            ]);

        } catch (\Throwable $th) {

            throw new Exception('Ошибка при создании EmailAccesToken в CreateEmailAccesTokenAction', 500);
            throw new Exception('Ошибка при создании EmailAccesToken в CreateEmailAccesTokenAction', 500);

        }

    }
}
