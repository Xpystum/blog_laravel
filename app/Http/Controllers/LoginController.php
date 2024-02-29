<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){

        // dd(session()->all());
        // dd(session()->has('df'));
        // return session()->get('foo');

        return view('login.login_index');
    }

    public function store(Request $request){

        // session()->forget('foo');

        alert(__('Добро пожаловать'));
       
        

        //Опеределённые поля
        $data = $request->only(['email', 'password', 'remember']); 

        return redirect()->route('user.user');
    }

}
