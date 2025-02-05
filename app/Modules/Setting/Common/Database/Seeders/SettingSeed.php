<?php

namespace App\Modules\Setting\Common\Database\Seeders;

use App\Modules\Post\Common\Database\Seeders\PostImgCoverSeed;
use Illuminate\Database\Seeder;



class SettingSeed extends Seeder
{

    public function run(): void
    {
        $this->call(PostImgCoverSeed::class); // название папки для статей
    }

}
