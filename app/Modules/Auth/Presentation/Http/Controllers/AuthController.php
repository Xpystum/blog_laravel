<?php
namespace App\Modules\Auth\Presentation\HTTP\Controllers;

use App\Http\Resources\UserResource;
use App\Modules\Auth\App\Data\DTO\UserAttemptDTO;
use App\Modules\Auth\Domain\Traits\TraitController;
use Illuminate\Http\Request;

use function App\Modules\Auth\Common\Helpers\array_success;

//для преобразование массива с сообщением



class AuthController extends Controller
{
    use TraitController;

    /**
     * Возвращать jwt токен если мы нашли юзера.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $json_token = $this->authService->attemptUserAuth(
            UserAttemptDTO::make(
                password: $request->password,
                email: $request->email,
                phone: $request->phone,
            )
        );


        $this->abort_unless($json_token, 404, 'Not Found - Пользователь с указанными данными не найден.');
        // abort_unless($json_token, 400, "Ошибка поиска User - Bad Request", ['Accept' => 'application/json']);

        return response()->json(array_success($json_token, 'Successfully login'), 200);
    }

    /**
     * Возвращать user по полученному токену в bearer.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user()
    {
        $user = $this->authService->getUserAuth();

        $this->abort_unless($user, 401);

        $userResource = new UserResource($user);

        #TODO Добавить ресурс возврата user (не полностью)
        return response()->json(array_success( $userResource, 'Successfully return user'), 200);
    }

    /**
     * Удалить актуальный токен.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $status = $this->authService->logout();

        $this->abort_unless($status, 401);

        return response()->json(array_success(message: 'Successfully logged out'), 200);
    }

    /**
     * Удалить акутальный токен и вернуть новый.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh(Request $request)
    {
        $token = $this->authService->refresh();

        $this->abort_unless($token, 401);

        return response()->json(array_success($token , 'Successfully refresh new token'), 200);
    }
}
