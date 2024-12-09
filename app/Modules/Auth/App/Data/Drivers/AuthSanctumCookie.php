<?php

namespace App\Modules\Auth\App\Data\Drivers;

use App\Modules\Auth\App\Data\DTO\BaseDTO;
use App\Modules\Auth\App\Data\DTO\UserAttemptDTO;
use App\Modules\Auth\Common\Config\AuthConfig;
use App\Modules\Auth\Domain\Interface\AuthInterfaceCookie;
use App\Modules\User\Domain\Models\User;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $status = $this->checkUserAuth($data);

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

        // Инвалидируем текущую сессию
        request()->session()->invalidate();

        // Генерируем новый CSRF токен для безопасности
        request()->session()->regenerateToken();

        return $status ? true : false;
    }

    /**
    * @param UserAttemptDTO $credentials
    *
    * @return bool
    */
    private function checkUserAuth(BaseDTO $credentials) : bool
    {
        
        $user = User::where('email', $credentials->email)
                ->orWhere('login', $credentials->login)
                ->first();


        if (! $user || ! Hash::check($credentials->password, $user->password)) {
            return false;
        }

        auth($this->config->guard)->login($user, $credentials->remember);

        return Auth::check();
    }

}
