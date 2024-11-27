<?php

namespace App\Modules\User\Domain\Services;

use App\Modules\User\App\Data\DTO\User\UserCreateDTO;
use App\Modules\User\Domain\Interactor\User\UserRegistrationInteractor;
use App\Modules\User\Domain\Models\User;

final class UserService
{
    public function __construct(
        private UserRegistrationInteractor $userRegistrationInteractor
    ) { }


    /**
     * @param UserCreateDTO $dto
     *
     * @return User
     */
    public function registrationUser(UserCreateDTO $dto) : User
    {
        return $this->userRegistrationInteractor->execute($dto);
    }
}
