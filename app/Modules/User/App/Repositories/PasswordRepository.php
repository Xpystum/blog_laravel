<?php

namespace App\Modules\User\App\Repositories;

use App\Modules\Base\CoreRepository;
use App\Modules\User\Domain\Actions\Password\CreatePasswordAction;
use App\Modules\User\Domain\Models\PasswordReset as Model;
use App\Modules\User\Domain\Models\User;

class PasswordRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param User $user
     *
     * @return Model
     */
    public function create(User $user) : Model
    {
        return CreatePasswordAction::make($user);
    }

}
