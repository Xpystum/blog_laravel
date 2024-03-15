<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use Illuminate\Database\Eloquent\Collection;

class PostController extends Controller
{
    public function index(){

        $posts = Post::query()
            ->latest()
            ->paginate(12, ['id', 'title' , 'published_at']);


        return view('user.posts.index', compact('posts'));
    }

    public function create(){


        return view('user.posts.create');
    } 

    public function store(StorePostRequest $request){

        // StorePostRequest $request

        // dd($request->all());

        dd($request->all());

        return redirect()->route('user.posts.create')->withInput();

        $validated = $request->validated();


        $post = Post::query()->create([

            'user_id' => User::query()->value('id'),

            'title' => $validated['title'],

            'content' => $validated['content'],

            'published_at' => new Carbon($validated['published_at'] ?? null),

            'published' => $validated['published'] ?? false,
        ]);

        dd($post);


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
