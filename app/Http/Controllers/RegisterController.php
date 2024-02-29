<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){

        return view('register.register_index');
    }

    public function store(Request $request){

        // //Способы получние Request
        // app()->make('request');

        // app('request');

        // app('request');

        // //Получить все поля
        // $data = $request->all();

        // //Опеределённые поля
        // $data = $request->only(['name', 'email']); 

        // //Исключить поля
        // $data = $request->except(['name', 'email']);

        // //Определённое поле по имени (возрват null, если пусто)
        // $data = $request->input('name');

        $name = $request->input('name');

        $email = $request->input('email');

        $password = $request->input('password');

        $agreement = $request->input('agreement');

        // dd(compact($name, $email, $password, $agreement));   

        return redirect()->back()->withInput();
        
        return redirect()->route('user.user');
    }
}
