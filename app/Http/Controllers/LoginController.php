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

        dd($ip);

        //Опеределённые поля
        $data = $request->only(['email', 'password', 'remember']); 
        dd($data);

        return 'Страница Входа';
    }

}
