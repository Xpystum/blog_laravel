<?php

namespace App\Modules\Post\Domain\Actions\Post;

use App\Modules\Post\App\Data\ValueObject\PostVO;
use App\Modules\Post\Domain\Models\Post;
use Exception;

class UpdatePostAction
{

    public static function make(PostVO $vo, Post $post) : bool
    {
        return (new self())->run($vo, $post);
    }


    private function run(PostVO $vo, Post $post) : bool
    {

        try {

            $status = $post->update($vo->updateModel());

        } catch (\Throwable $th) {

            $nameClass = self::class;

            logError("Ошибка в {$nameClass} при создании записи: " . $th);
            throw new Exception('Ошибка в классе: ' . $nameClass, 500);

        }

        return $status;
    }
}
