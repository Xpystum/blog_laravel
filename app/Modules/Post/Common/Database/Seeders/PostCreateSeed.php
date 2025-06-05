<?php

namespace App\Modules\Post\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Modules\Post\Domain\Models\Post;
use App\Modules\User\Domain\Models\User;
use App\Modules\Post\Domain\Models\Comment;
use App\Modules\User\Domain\Models\Profile;

class PostCreateSeed extends Seeder
{

    public function run(): void
    {

        $user = User::factory()->create([
            "email" => 'qjq3@mail.ru',
            "login" => 'Xpystum',
            "password" => Hash::make('password'),
        ]);

        Profile::factory()->create([
            "user_id" => $user->id,
        ]);


        $userOther = User::factory()->create([
                    "email" => 'qjq4@mail.ru',
                    "login" => 'Oleg',
                    "password" => Hash::make('password'),]);

        Profile::factory()->create([
            "user_id" => $userOther->id,
        ]);

        for ($i = 0; $i < 4; $i++) {

            $post = Post::factory()
                ->for($user)
                ->create();

            for ($о=0; $о < 6; $о++) {

                $comments = Comment::factory()
                    ->for($userOther, 'user')
                    ->for($post, 'post')
                    ->create();

            }


        }


    }
}

