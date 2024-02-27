<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $post = (object) [

            'id' => 1,

            'title' => "Lorem ipsum dolor sit amet.",

            'content' => "Lorem <strong>ipsum dolor</strong> sit amet consectetur adipisicing elit. Doloremque nobis recusandae earum? Perferendis, praesentium distinctio?",
        ];

        $posts = array_fill(0, 10, $post);


        return view('user.posts.index', compact('posts'));
    }

    public function create(){
        return view('user.posts.create');
    } 

    public function store(Request $request){

        // dd($request->all());

        return redirect()->route('user.posts.show', 1);
    }

    public function show(int $IdPost){

        
        $post = (object) [

            'id' => 1,

            'title' => "Lorem ipsum dolor sit amet.",

            'content' => "Lorem <strong>ipsum dolor</strong> sit amet consectetur adipisicing elit. Doloremque nobis recusandae earum? Perferendis, praesentium distinctio?",
        ];

        $posts = array_fill(0, 10, $post);


        $posts = new Collection($posts);
        $post = $posts->first(function ($post) use($IdPost) {

            return $post->id == $IdPost;

        });

        return view('user.posts.show', compact('post'));
    }

    public function edit(Request $request, $post){
        $post = (object) [

            'id' => 1,

            'title' => "Lorem ipsum dolor sit amet.",

            'content' => "Lorem <strong>ipsum dolor</strong> sit amet consectetur adipisicing elit. Doloremque nobis recusandae earum? Perferendis, praesentium distinctio?",
        ];
      
        return view('user.posts.edit', compact('post'));
    }

    public function update(Request $reqeust, $post){


        // return redirect()->route('user.posts.show', $post);

        return redirect()->back();
    }

    public function delete($post){


        return redirect()->route('name.posts');
    }

    public function like(){
        return 'like + 1';
    }

}
