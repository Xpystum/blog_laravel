<?php

namespace App\Modules\Post\Domain\Services;

use App\Modules\Base\Response\FunctionResult;
use App\Modules\Post\App\Data\ValueObject\CommentVO;
use App\Modules\Post\Domain\Actions\CreateCommentAction;

class CommentService
{
    /**
     * @param CommentVO $vo
     *
     * @return FunctionResult
     */
    public function createComment(CommentVO $vo) : FunctionResult
    {
        /** @var Comment */
        $commnent = CreateCommentAction::make($vo);

        return $commnent ? FunctionResult::success('Комментарий добавлен.') : FunctionResult::error('Ошибка добавления комменатрия к посту.');
    }
}
