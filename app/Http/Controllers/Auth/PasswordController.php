<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Domain\Services\Adapter\AdapterSanctumCookie;
use App\Modules\User\App\Data\Enums\PasswordResetStatusEnum;
use App\Modules\User\Domain\Models\PasswordReset;
use App\Modules\User\Domain\Models\User;
use App\Modules\User\Domain\Request\PasswordRequest;
use App\Modules\User\Domain\Services\PasswordService;
use Illuminate\Http\Request;


class PasswordController extends Controller
{

    public function index()
    {
        return view('includes.auth.password.password_index');
    }

    public function store(
        Request $request,
        PasswordService $passService,
    ) {

        $email = $request->input('email');

        /**
        * @var User
        */
        $user = User::query()->where('email', $email)->first();

        if($user) { $status = $passService->send($user->id); }

        return view('includes.auth.password.password_info');
    }

    public function edit(PasswordReset $passwordReset)
    {
        abort_unless($passwordReset->user_id, 404);
        abort_unless($passwordReset->status->is(PasswordResetStatusEnum::pending), 404);

        return view('includes.auth.password.password_edit' , compact('passwordReset'));
    }

    public function update(
        PasswordReset $passwordReset,
        PasswordService $passService,
        PasswordRequest $PasswordRequest,
        AdapterSanctumCookie $auth,
    ) {

        $validated = $PasswordRequest->validated();

        /** @var User */
        $user = $passwordReset->user;

        //доп проверка
        abort_unless($user, 404);

        $status = $passService->confirmReset($passwordReset, $validated['password']);

        //сообщаем в alert что произошло
        $alert = $status->success ? ['alert_success' => $status->returnValue]  : ['alert_danger' => $status->errorMessage];

        if(isset($alert['alert_success'])) {

            //авторизируем user
            $auth->loginUser($user);

        }


        return redirect()->route('home')->with($alert);
    }
}
