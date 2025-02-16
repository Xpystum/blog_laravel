<?php

namespace App\Modules\Post\Domain\Actions\Post;

use App\Modules\Post\App\Data\ValueObject\Like\LikeForPostVO;
use App\Modules\Post\Domain\Models\LikeForPost;
use Exception;

class FirstOrCreatePostAction
{

    public static function make(LikeForPostVO $vo) : LikeForPost
    {
        return (new self())->run($vo);
    }


    private function run(LikeForPostVO $vo) : LikeForPost
    {

        try {

            $model = LikeForPost::firstOrCreate(
                $vo->toArrayNotNull(),
                $vo->toArrayNotNull(),
            );

        } catch (\Throwable $th) {

            $nameClass = self::class;

            logError("Ошибка в {$nameClass} при создании записи: " . $th);
            throw new Exception('Ошибка в классе: ' . $nameClass, 500);

        }

        return $model;
    }
}
