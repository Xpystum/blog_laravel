<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use App\Modules\Auth\App\Data\DTO\UserAttemptDTO;
use App\Modules\Auth\Domain\Requests\LoginRequest;
use App\Modules\Auth\Domain\Services\Adapter\AdapterSanctumCookie;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        return view('login.login_index');
    }

    public function store(
        // Request $request,
        LoginRequest $request,
        AdapterSanctumCookie $authServ,
    ) {

        $validated = $request->validated();
        // $validated = $request->all();

        // return back()->withErrors([
        //     'password' => 'Неверный пароль.',
        // ])->withInput($request->only('email'));

        $user = $authServ->attemptUser(
            UserAttemptDTO::make(
                email: $validated['email_login'],
                login: $validated['email_login'],
                password: $validated['password'],
            )
        );

        dd($user);


        dd($validated);

        //Опеределённые поля
        $data = $request->only(['email', 'password', 'remember']);

        return redirect()->route('user.user');
    }

}
