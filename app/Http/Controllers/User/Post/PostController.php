<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // public function index()
    // {

    // }


    // public function show()
    // {

    // }


    public function store(Request $request)
    {
        dd($request->all());
    }
}
