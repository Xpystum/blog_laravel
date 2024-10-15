<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class TestController extends Controller
{
    public function index(){

        for($i = 0; $i <= 50; $i++){

            Post::query()->create([

                'user_id' => User::query()->value('id'),
                'title' => fake()->sentence(),
                'content' => fake()->paragraph(),
                'published' => true,
                'published_at' => fake()->dateTimeBetween(now()->subYear(), now())

            ]);
        };

    }
}
