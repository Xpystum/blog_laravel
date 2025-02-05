<?php

namespace App\Modules\Post\Domain\Services;

use App\Modules\Post\App\Data\ValueObject\CommentVO;
use App\Modules\Post\Domain\Actions\CreateCommentAction;
use App\Modules\Post\Domain\Models\Comment;

class CommentService
{
    /**
     * Создание записи Comment
     * @param CommentVO $vo
     *
     * @return Comment
     */
    public function createComment(CommentVO $vo) : Comment
    {
        return CreateCommentAction::make($vo);
    }
}
