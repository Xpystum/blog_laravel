<?php

namespace App\Modules\Setting\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Post\Common\Database\Seeders\PostImgCoverSeed;



class SettingSeed extends Seeder
{

    public function run(): void
    {
        $this->call(PostImgCoverSeed::class); // название папки для статей
    }

}
