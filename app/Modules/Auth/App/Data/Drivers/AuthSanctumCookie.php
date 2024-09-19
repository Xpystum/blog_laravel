<?php

namespace App\Modules\Auth\App\Data\Drivers;

use App\Modules\Auth\App\Data\DTO\BaseDTO;
use App\Modules\Auth\App\Data\DTO\UserAttemptDTO;
use App\Modules\Auth\Common\Config\AuthConfig;
use App\Modules\Auth\Domain\Interface\AuthInterfaceCookie;
use App\Modules\User\Domain\Models\User;
use Illuminate\Foundation\Auth\User as Model;

class AuthSanctumCookie implements AuthInterfaceCookie
{

    private ?AuthConfig $config = null;

    public function __construct(AuthConfig $config) {
        $this->config = $config;
    }

    /**
     * @param UserAttemptDTO $data
     *
     * @return bool
    */
    public function attemptUser(BaseDTO $data)
    {
       $status = auth($this->config->UrlExpiresConfig)->attempt($data->toArray());
       return $status ? true : false;
    }

    /**
     * @param User модель User
     *
     * @return [type]
     */
    public function loginUser(Model $model)
    {
        return auth($this->config->guard)->login($model);
    }

    public function user()
    {
        return auth($this->config->guard)->user();
    }
    public function logout()
    {
        $status = auth($this->config->guard)->logout();

        return $status ? true : false;
    }

}
