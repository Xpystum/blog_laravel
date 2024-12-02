<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use App\Modules\Auth\App\Data\DTO\UserAttemptDTO;
use App\Modules\Auth\Domain\Requests\LoginRequest;
use App\Modules\Auth\Domain\Services\Adapter\AdapterSanctumCookie;
use Exception;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login.login_index');
    }

    public function store(
        // Request $request,
        LoginRequest $request,
        AdapterSanctumCookie $authServ,
    ) {


        $validated = $request->validated();

        $status = $authServ->attemptUser(
            UserAttemptDTO::make(
                email: $validated['email_login'],
                login: $validated['email_login'],
                remember: $validated['remember'] ?? false,
                password: $validated['password'],
            )
        );

        return $status ? redirect()->route('home')
            : redirect()->back()->withErrors(['error' => 'Не правильный Логин/Почта или пароль.']);
    }

}
