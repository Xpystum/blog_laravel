<?php
namespace App\Modules\Auth\Common\Tests\Feature;


use App\Models\User;
use App\Modules\Auth\App\Data\DTO\UserAttemptDTO;
use App\Modules\Auth\Common\Tests\TestCase;
use App\Modules\Auth\Domain\Services\AuthService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Request;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected AuthService $serv;

    protected function setUp(): void {
        parent::setUp(); // Вызов метода родительского класса
        $this->serv = app(AuthService::class); // Инициализация $serv
    }

    /**
     * Тест на вход юзера и получение токена
     * @return [type]
     */
    public function test_attemptUserAuth()
    {
        $phone = '79200648827';
        $password = '123456';
        $email = 'test2@example.com';

        {
            $token = $this->createUserToken();

            $array = compact('phone', 'password', 'email');

            $response = $this->withHeaders([
                'Authorization' => 'Bearer ' . $token['access_token'],
            ])->json('POST', '/api/auth/login', $array);

            $response->assertStatus(200);


            $response->assertJsonStructure([
                "data" => [
                    "access_token",
                    "token_type",
                    "expires_in",
                ],
                "message"
            ]);
        }

        {
            $password = '1234567';

            $array = compact('phone', 'password', 'email');

            $response = $this->withHeaders([
                'Authorization' => 'Bearer ' . $token['access_token'],
            ])->json('POST', '/api/auth/login', $array);

            $response->assertStatus(404);
        }


    }

    /**
     * Получить user по токену Bearer
     * @return [type]
     */
    public function test_getUserAuth()
    {

        $token = $this->createUserToken();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token['access_token'],
        ])->json('POST', '/api/auth/user');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data' => [],
            "message",
        ]);

    }

    /**
     * Удалить актуальный токен
     * @return [type]
     */
    public function test_logout()
    {
        {
            $token = $this->createUserToken();

            $response = $this->withHeaders([
                'Authorization' => 'Bearer ' . $token['access_token'],
            ])->json('POST', '/api/auth/logout');

            $response->assertStatus(200);

            $response->assertJsonStructure([
                'data' => [],
                "message",
            ]);

        }
    }

    /**
     * Удаление акутального bearer токена и получение нового
     * @return [type]
    */
    public function test_refresh()
    {
        {
            $token = $this->createUserToken();

            $response = $this->withHeaders([
                'Authorization' => 'Bearer ' . $token['access_token'],
            ])->json('POST', '/api/auth/refresh');

            $response->assertStatus(200);

            $response->assertJsonStructure([
                'data' => [],
                "message",
            ]);

        }

        {
            $response = $this->withHeaders([
                'Authorization' => 'Bearer ' . ';12',
            ])->json('POST', '/api/auth/refresh');

            dd($response);

            $response->assertStatus(401);
        }
    }

    /**
     * Тест сервеса и метода loginUser - где мы возвращаем токен по модели
     * @return [type]
     */
    public function test_loginUser()
    {
        $user = $this->createUser();
        $array = $this->serv->loginUser($user);
        $this->assertIsArray($array);
    }



//Private
    private function createUser() : Model
    {
        $phone = '79200648827';
        $password = '123456';
        $email = 'test2@example.com';

        return User::factory()->create([
            'name' => 'Test User',
            'phone' => $phone,
            'email' => $email,
            'password' => $password,
        ]);
    }

    private function createUserToken() : array
    {
        $phone = '79200648827';
        $password = '123456';
        $email = 'test2@example.com';
        $this->createUser();

        return $this->serv->attemptUserAuth(UserAttemptDTO::make($password, $phone, $email));
    }
}
