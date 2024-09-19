<?php

namespace App\Modules\Auth\App\Data\Drivers;

use App\Modules\Auth\App\Data\DTO\BaseDTO;
use App\Modules\Auth\Common\Config\AuthConfig;
use App\Modules\Auth\Domain\Interface\AuthInterfaceToken;
use App\Modules\User\Domain\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

#TODO ->addMinutes(360) - добавить время истечения
class AuthSanctum implements AuthInterfaceToken
{
    private ?AuthConfig $config = null;

    public function __construct(AuthConfig $config) {
        $this->config = $config;
    }

    /**
     * Нахождение пользователя по password/email/phone и получение токена
     * @param BaseDTO $data
     *
     * @return [type]
     */
    public function attemptUser(BaseDTO $data)
    {
        return is_null($data) ? false : $this->checkUserAuth($data);
    }

    /**
     * @param User $model
     * @param string $token_name
     *
     * @return [type]
     */
    public function loginUser(Model $model)
    {
        if(!$model) { return null; }

        /**
        *@var string $token
        */
        $token = $model->createToken($this->getNameTimeToken(), ['*'], now()->addMinutes($this->config->UrlExpiresConfig))->plainTextToken;

        return $this->respondWithToken($token);
    }

    /**
     * Вернуть пользователя по токену (обязательно должен быть middleware auth:sanctum)
     * @return bool|Model
     */
    public function user()
    {

        $user = auth('sanctum')->user();

        return $user ? $user : false;
    }

    /**
    * Удалить токен (обязательно должен быть middleware auth:sanctum)
    * @return bool|Model
    */
    public function logout()
    {
        /**
        * @var User
        */
        $user = auth('sanctum')->user();

        /**
         * @var PersonalAccessToken
        */
        $token = $user->currentAccessToken();

        $status = $token->delete();

        return $status ? true : false;

    }

    public function refresh() : bool|array
    {
        /**
        * @var User
        */
        $user = auth('sanctum')->user();

        #TODO Здесь может быть ошибка с актуальными токена т.е нужно получать из beare получать его из user и уже его удалять.
        /**
        * @var PersonalAccessToken
        */
        $token = $user->currentAccessToken();

        // Удаляем старый токен, если он существует (есть проблема он получит все токены..)
        if ($token) { $token->delete(); }


        // Создаем новый токен
        $newToken = $user->createToken($this->getNameTimeToken(), ['*'], now()->addMinutes($this->config->UrlExpiresConfig))->plainTextToken;

        return $newToken ? $this->respondWithToken($newToken) : false;
    }

    public function respondWithToken(string $token) : ?array
    {

        $data = [
            'access_token' => $token,
            'token_type' => 'Bearer ',
            'expires_in' => $this->config->UrlExpiresConfig,
        ];

        return $data;

    }

    /**
     * @param UserAttemptDTO $credentials
     *
     * @return bool
     */
    private function checkUserAuth(BaseDTO $credentials) : bool|array
    {

        $user = User::where('email', $credentials->email)
                ->orWhere('phone', $credentials->phone)
                ->first();


        if (! $user || ! Hash::check($credentials->password, $user->password)) {
            return false;
        }

        $token = $user->createToken($this->getNameTimeToken(), ['*'], now()->addMinutes($this->config->UrlExpiresConfig))->plainTextToken;

        return $this->respondWithToken($token);
    }

    private function getNameTimeToken() : string
    {
        return 'Token для авторизации, время создание: ' . now()->format('Y:m:d H:i:s');
    }
}
