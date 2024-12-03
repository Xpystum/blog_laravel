<?php

namespace App\Http\Controllers\Logout;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Domain\Services\Adapter\AdapterSanctumCookie;

class LogoutController extends Controller
{
    public function logout(
        AdapterSanctumCookie $auth,
    ) {

        $auth->logout();

        return redirect()->route('home');
    }
}
