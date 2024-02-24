<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){

        return view('register.register_index');
    }

    public function store(){

        return 'Запрос на Регистрацию';
    }
}
