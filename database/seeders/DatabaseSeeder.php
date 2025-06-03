<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            \App\Modules\Setting\Common\Database\Seeders\SettingSeed::class, //обязательно для заполнение, *завязано логика добавление post и обложки
            \App\Modules\Post\Common\Database\Seeders\PostCreateSeed::class,
            \App\Modules\User\Common\Database\Seeders\MessagesSeed::class,
        ]);
    }
}
