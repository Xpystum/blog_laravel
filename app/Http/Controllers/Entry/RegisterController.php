<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Domain\Services\Adapter\AdapterSanctumCookie;
use App\Modules\User\App\Data\DTO\User\UserCreateDTO;
use App\Modules\User\Common\Requests\UserRegisterRequest;
use App\Modules\User\Domain\IRepository\IUserRepository;
use App\Modules\User\Domain\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Auth;

use function App\Modules\User\Common\Helpers\responseError;

class RegisterController extends Controller
{
    public function index(){

        return view('register.register_index');
    }

    public function store(
        UserRegisterRequest $request,
        UserService $serviceUser,
        AdapterSanctumCookie $auth,
    ) {

        $validated = $request->validated();

        $user = $serviceUser->registrationUser(UserCreateDTO::make(
            login: $validated['login'],
            email: $validated['email'],
            type: $validated['type'],
            password: $validated['password'],
        ));


        //Регистрируем user в приложении.
        $auth->loginUser($user);

        return redirect()->route('home');
    }
}
