<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Contracts\Service\Attribute\Required;

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

    public function store(StorePostRequest $request){

        $validated = $request->validated();

        // $validator = validator($request->all(), [
        //     'title' => ['required', 'string', 'max:100'],
        //     'content' => ['required', 'string', 'max:1000']
        // ])->validate();

        // if(true){

        //     throw ValidationException::withMessages([

        //         'account' => __('Недостаточно Средств'),

        //     ]);

        // }


        alert('Сохранено!');

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

    public function update(StorePostRequest $reqeust, $post){


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
