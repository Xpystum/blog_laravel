<?php

namespace App\Modules\Post\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Modules\Setting\Domain\Models\Setting;

class PostImgCoverSeed extends Seeder
{

    public function run(): void
    {
        //Добавление в таблицу констант
        Setting::set('post_img_name_folder', 'cover', 'название папки для сохранения обложек статьи');
    }
}
