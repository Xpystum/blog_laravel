<?php

namespace App\Modules\User\Domain\Actions\User;

use App\Modules\Base\Errors\ActionException;
use App\Modules\User\App\Data\DTO\User\UserCreateDTO;
use App\Modules\User\Domain\Models\User;
use Exception;

class CreateUserAction
{

    /**
     * @param UserCreateDTO $dto
     *
     * @return User
     */
    public static function make(UserCreateDTO $dto) : ?User
    {
        return (new self)->run($dto);
    }

    /**
     * @param UserCreateDTO $data
     *
     * @return ?User
     */
    public static function run(UserCreateDTO $data) : ?User
    {
        try {

            $model = User::query()->create($data->toArrayNotNull());

            return $model;

        } catch (\Throwable $th) {

            logError($th, [$data]);
            throw new ActionException('Ошибка при создании User в CreateUserAction.', 500);

        }
    }

}
