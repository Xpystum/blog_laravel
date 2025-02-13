<?php

namespace App\Modules\Post\App\DTO;

use App\Modules\Base\Traits\FilterArrayTrait;
use App\Modules\Post\App\Data\ValueObject\Post\PostVO;
use App\Modules\Post\Domain\Models\Post;
use Illuminate\Http\UploadedFile;

class UpdatePostDTO
{

    use FilterArrayTrait;

    public function __construct(
        public PostVO $vo,
        public Post $post,
        public ?UploadedFile $file,
    ) {}

    public static function make(

        PostVO $vo,
        Post $post,
        ?UploadedFile $file,

    ) : self {

        return new self(
            vo: $vo,
            post: $post,
            file: $file,
        );

    }

}
