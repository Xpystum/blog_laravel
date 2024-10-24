<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Domain\Services\Adapter\AdapterSanctumCookie;
use App\Modules\User\App\Data\DTO\User\UserCreateDTO;
use App\Modules\User\Common\Requests\UserRegisterRequest;
use App\Modules\User\Domain\IRepository\IUserRepository;

use function App\Modules\User\Common\Helpers\responseError;

class RegisterController extends Controller
{
    public function index(){

        return view('register.register_index');
    }

    public function store(
        UserRegisterRequest $request,
        IUserRepository $rep,
        AdapterSanctumCookie $auth,
    ) {
        $validated = $request->validated();


        $status = $rep->create(UserCreateDTO::make(
            login: $validated['login'],
            email: $validated['email'],
            type: $validated['type'],
            password: $validated['password'],
        ));

        //Если будет ошибка при создании user - выкидываем с ошибкой обратно в blade
        if(!$status) { responseError("Такой пользователь уже существует."); }

        //Регистрируем user в приложении.
        $auth->loginUser($status);

        dd(1);

        return redirect()->route('user.user');
    }
}
