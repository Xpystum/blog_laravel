<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Domain\Services\Adapter\AdapterSanctumCookie;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {

        return view('login.login_index');
    }

    public function store(Request $request, AdapterSanctumCookie $authServ){


        dd('hello IVAN');
        dd($request);
        alert(__('Добро пожаловать'));

        //Опеределённые поля
        $data = $request->only(['email', 'password', 'remember']);

        return redirect()->route('user.user');
    }

}
