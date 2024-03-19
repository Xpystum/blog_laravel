<?php

namespace App\Http\Controllers\User;

use SplFileInfo;
use App\Models\Post;
use App\Models\User;
use App\Models\PostImg;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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

        $validated = $request->validated();
        dd('after validation');

        #TODO добавление img в бд в формате base64 плохой подход, лучше это делать через storage (посмотреть логику как вернуть изображение в редактор в точное место на фронте во view)
        //добавление изображение в storage
        $path = Storage::putFile('images/post/main', $request['imgMain']);

        //получение информации о файле
        // $infoFile = new SplFileInfo($path);

        if( !isset($validated['imgAlt']) )
        {
            $validated['imgAlt'] = $validated['imgMain']->getClientOriginalName();
        }

        $img = PostImg::query()->create([
            'pathImg' => $path,
            'alt' => $validated['imgAlt'],
        ]);

        abort_unless($img, 404);

        $post = Post::query()->create([

            'user_id' => User::query()->value('id'),

            'title' => $validated['title'],

            'content' => $validated['content'],

            'published_at' => new Carbon($validated['published_at'] ?? null),

            'published' => $validated['published'] ?? false,

            'pathImg_id' => $img->id,
        ]);

        abort_unless($post, 404);

        dd($post);

        return redirect()->route('user.posts.create')->withInput();


        $post = Post::query()->create([

            'user_id' => User::query()->value('id'),

            'title' => $validated['title'],

            'content' => $validated['content'],

            'published_at' => new Carbon($validated['published_at'] ?? null),

            'published' => $validated['published'] ?? false,
        ]);


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
