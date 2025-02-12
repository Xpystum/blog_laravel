<?php

namespace App\Modules\Post\Domain\Actions\Post;

use Exception;

use App\Modules\Post\Domain\Models\PostImageCover;
use App\Modules\Post\App\Data\ValueObject\PostImageCoverVO;

class CreatePostImageCoverAction
{

    public static function make(PostImageCoverVO $vo) : PostImageCover
    {
        return (new self())->run($vo);
    }


    private function run(PostImageCoverVO $vo) : PostImageCover
    {

        try {

            $model = PostImageCover::create($vo->toArrayNotNull());

        } catch (\Throwable $th) {

            $nameClass = self::class;

            logError('Ошибка в классе: ' . $nameClass, $th);
            throw new Exception('Ошибка в классе: ' . $nameClass, 500);

        }

        return $model;
    }
}
