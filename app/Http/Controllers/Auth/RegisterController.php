<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Domain\Services\Adapter\AdapterSanctumCookie;
use App\Modules\User\App\Data\DTO\User\UserCreateDTO;
use App\Modules\User\Common\Requests\UserRegisterRequest;
use App\Modules\User\Domain\Services\UserService;


class RegisterController extends Controller
{
    public function index(){

        return view('includes.auth.register.register_index');
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
