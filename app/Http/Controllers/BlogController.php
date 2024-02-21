<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){

        return 'Посты в блоге';

    }
    
    public function show(){

        return 'Один пост в блоге';

    }

    public function like(){

        return 'поставить лайк';
        
    }

}
