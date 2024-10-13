<?php

namespace App\Modules\User\Domain\Actions\User;

use App\Modules\User\App\Data\DTO\User\UserCreateDTO;
use App\Modules\User\Domain\Models\User;

class CreateUserAction
{

    /**
     * @param UserCreateDTO $data
     *
     * @return ?User
     */
    public static function run(UserCreateDTO $data) : ?User
    {

        try {

            $user = User::query()->create([
                'login' => $data->login,
                'email' => $data->email,
                'type' => $data->type,
                'password' => $data->password,
            ]);

            return $user;

        } catch (\Throwable $th) {

            info($th);
            return null;

        }

    }

}
