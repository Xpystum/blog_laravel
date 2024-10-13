<?php

namespace App\Http\Controllers\Entity\Blog;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    public function index(Request $request){

        $validated = $request->validate([

            'search' => ['nullable', 'string', 'max:50'],

            'from_date' => ['nullable', 'string', 'date'],

            'to_date' => ['nullable', 'string', 'date',  'after:from_date'],

        ]);

        $query = Post::query();

        if($search = $validated['search'] ?? null)
        {
            $query->where('title', 'like', "%{$search}%");
        }

        if($fromDate = $validated['from_date'] ?? null)
        {
            $query->where('published_at', '>=', new Carbon($fromDate) );
        }

        if($toDate = $validated['to_date'] ?? null)
        {
            $query->where('published_at', '<=', new Carbon($toDate) );
        }


        $posts = $query
            ->with(['img' => function ($query) {
                $query->select('id', 'pathImg' , 'alt'); // Обязательно указываем 'post_id', чтобы сохранить связь
            }])
            ->select('id', 'title', 'pathImg_id', 'published_at', 'info_post')
            ->latest('published_at')
            ->paginate(6);


        return view('blog.blog_index', compact('posts'));
    }

    public function show(Request $request, Post $post){


        //закидываем первые самые актулизированные посты в cache
        $post = cache()->remember(

            key: "posts.{$post}",

            ttl: now()->addHour(),

            callback: function () use ($post) {

                return Post::query()->findOrFail($post->id);

            }

        );


        // $post = Post::query()->findOrFail(1);
        // $post = Post::query()->oldest('id')->firstOrFail();


        return view('blog.blog_show', compact('post'));

    }

    public function like(){

        return 'поставить лайк';

    }

}
