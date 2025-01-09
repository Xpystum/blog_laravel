<?php

namespace App\Modules\Post\Domain\Actions;

use App\Modules\Post\App\Data\ValueObject\PostVO;
use App\Modules\Post\Domain\Models\Post;
use Exception;

class CreatePostAction
{

    public static function make(PostVO $vo) : Post
    {
        return (new self())->run($vo);
    }


    private function run(PostVO $vo) : Post
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
