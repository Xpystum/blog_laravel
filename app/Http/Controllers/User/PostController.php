<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return 'Страница списка постов';
    }

    public function create(){
        return 'Страница создание постов';
    } 

    public function store(){
        return 'Запрос создание поста';
    }

    public function show(){
        return 'Страница просмотра поста';
    }

    public function edit(Request $request){
        return "Страница изменение поста {$request->input()}";
    }

    public function update(){
        return 'Запрос изменение поста';
    }

    public function delete(){
        return 'Запрос удаление поста';
    }

    public function like(){
        return 'like + 1';
    }

}
