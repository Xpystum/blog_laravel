<?php

namespace App\Modules\Post\Domain\Actions;

use App\Modules\Post\App\Data\ValueObject\PostVO;
use App\Modules\Post\Domain\Models\Post;
use Exception;

class CreatePostAcetion
{

    public static function make(PostVO $vo)
    {
        return (new self())->run($vo);
    }


    private function run(PostVO $vo)
    {

        try {

            $model = Post::create($vo->toArrayNotNull());

        } catch (\Throwable $th) {

            $nameClass = self::class;

            logError("Ошибка в {$nameClass} при создании записи: " . $th);
            throw new Exception('Ошибка в классе: ' . $nameClass, 500);

        }

        return $model;
    }
}
