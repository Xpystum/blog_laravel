<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\User\Domain\Models\PasswordReset;
use App\Modules\User\Domain\Models\User;
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

        $status = $passService->send($user->id);

        return view('includes.auth.password.password_info');
    }

    public function confirm(PasswordReset $passwordReset)
    {
        dd($passwordReset);
    }
}
