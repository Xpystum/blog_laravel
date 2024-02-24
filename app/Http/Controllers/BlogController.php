<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){

        $post = (object) [

            'id' => 1,

            'title' => "Lorem ipsum dolor sit amet.",

            'content' => "Lorem <strong>ipsum dolor</strong> sit amet consectetur adipisicing elit. Doloremque nobis recusandae earum? Perferendis, praesentium distinctio?",
        ];

        $posts = array_fill(0, 10, $post);


        return view('blog.blog_index', compact('posts'));

    }
    
    public function show(){

        $post = (object) [

            'id' => 1,

            'title' => "Lorem ipsum dolor sit amet.",

            'content' => "Lorem <strong>ipsum dolor</strong> sit amet consectetur adipisicing elit. Doloremque nobis recusandae earum? Perferendis, praesentium distinctio?",
        ];

        return view('blog.blog_show', compact('post'));

    }

    public function like(){

        return 'поставить лайк';
        
    }

}
