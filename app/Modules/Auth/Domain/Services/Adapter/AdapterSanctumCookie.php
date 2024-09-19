<?php

namespace App\Modules\Auth\Domain\Services\Adapter;

use App\Modules\Auth\App\Data\DTO\UserAttemptDTO;
use App\Modules\Auth\Domain\Services\AuthService;
use App\Modules\User\Domain\Models\User;

class AdapterSanctumCookie
{
    public function __construct(
        public AuthService $serv
    ) {}

    public function attemptUser(UserAttemptDTO $data)
    {
        return $this->serv->attemptUserAuth($data);
    }

    public function logout()
    {
        return $this->serv->logout();
    }

    public function loginUser(User $model)
    {
        return $this->serv->loginUser($model);
    }

    public function user()
    {
        return $this->serv->getUserAuth();
    }

}
