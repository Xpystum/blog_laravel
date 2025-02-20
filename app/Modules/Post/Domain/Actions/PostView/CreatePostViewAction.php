<?php

namespace App\Modules\Post\Domain\Actions\PostView;

use App\Modules\Post\App\Data\ValueObject\PostView\PostViewVO;
use Exception;
use App\Modules\Post\Domain\Models\PostView;

class CreatePostViewAction
{

    public static function make(PostViewVO $vo) : PostView
    {
        return (new self())->run($vo);
    }


    private function run(PostViewVO $vo) : PostView
    {

        try {

            $model = PostView::create($vo->toArrayNotNull());

        } catch (\Throwable $th) {

            $nameClass = self::class;

            logError("Ошибка в {$nameClass} при создании записи: " . $th);
            throw new Exception('Ошибка в классе: ' . $nameClass, 500);

        }

        return $model;
    }
}
