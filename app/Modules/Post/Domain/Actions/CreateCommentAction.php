<?php

namespace App\Modules\Post\Domain\Actions;

use App\Modules\Post\App\Data\ValueObject\Comment\CommentVO;
use App\Modules\Post\Domain\Models\Comment;
use Exception;

class CreateCommentAction
{

    public static function make(CommentVO $vo) : Comment
    {
        return (new self())->run($vo);
    }


    private function run(CommentVO $vo) : Comment
    {

        try {

            $model = Comment::create($vo->toArrayNotNull());

        } catch (\Throwable $th) {

            $nameClass = self::class;

            logError("Ошибка в {$nameClass} при создании записи: " . $th);
            throw new Exception('Ошибка в классе: ' . $nameClass, 500);

        }

        return $model;
    }
}
