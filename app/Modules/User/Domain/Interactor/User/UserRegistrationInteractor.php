<?php

namespace App\Modules\User\Domain\Interactor\User;

use App\Modules\User\App\Data\DTO\User\UserCreateDTO;
use App\Modules\User\Domain\Actions\User\Avatar\GetAvatarAction;
use App\Modules\User\Domain\Actions\User\CreateUserAction;
use App\Modules\User\Domain\Models\User;
use Exception;

class UserRegistrationInteractor
{

    /**
     * @param UserCreateDTO $dto
     *
     * @return User
     */
    public function execute(UserCreateDTO $dto) : User
    {
        return $this->run($dto);
    }

    private function run(UserCreateDTO $dto) : User
    {

        $user = $this->createUser($dto);

        try {

            // $user = $this->createUser($dto);

        } catch (\Throwable $th) {

            logError($th);
            throw new Exception('Ошибка в UserRegistrationInteractor.' , 500);

        }

        return $user;
    }

    private function createUser(UserCreateDTO $dto) : User
    {
        return CreateUserAction::make($dto);
    }

}
