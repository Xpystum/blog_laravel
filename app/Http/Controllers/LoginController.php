<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){



        return view('login.login_index');
    }

    public function store(Request $request){
        
        $ip = $request->ip();

        //Опеределённые поля
        $data = $request->only(['email', 'password', 'remember']); 

        return redirect()->route('user.user');
    }

}
