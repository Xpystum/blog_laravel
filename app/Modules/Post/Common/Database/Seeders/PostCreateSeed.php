<?php

namespace App\Modules\Post\Common\Database\Seeders;

use App\Modules\Post\Domain\Models\Post;
use App\Modules\User\Domain\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostCreateSeed extends Seeder
{

    public function run(): void
    {

        $user = User::factory()->create([
            "email" => 'qjq3@mail.ru',
            "login" => 'Xpystum',
            "password" => Hash::make('password'),
        ]);


        $status = Post::factory()->count(4)
            ->for($user)
            ->create();

        dd($status->path_img_cover_post);

    }
}

