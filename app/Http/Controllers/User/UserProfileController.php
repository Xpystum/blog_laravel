<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Domain\Services\Adapter\AdapterSanctumCookie;
use Illuminate\Http\Request;


class UserProfileController extends Controller
{
    public function logout(
        AdapterSanctumCookie $auth,
    ) {

        $auth->logout();
        
        return redirect()->route('home');
    }
}
