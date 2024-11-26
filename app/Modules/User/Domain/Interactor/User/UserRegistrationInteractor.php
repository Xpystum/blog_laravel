<?php

namespace App\Modules\User\Domain\Interactor\User;

use App\Modules\User\Domain\Actions\User\CreateUserAction;
use App\Modules\User\Domain\Models\User;

class UserRegistrationInteractor
{


    private function createUser() : User
    {
        return CreateUserAction::make();
    }

    private function serAvatar()
    {

    }
}
