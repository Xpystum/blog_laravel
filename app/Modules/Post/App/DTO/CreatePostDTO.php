<?php

namespace App\Modules\Post\App\DTO;

use App\Modules\Base\Traits\FilterArrayTrait;
use App\Modules\Post\App\Data\ValueObject\Post\PostVO;
use Illuminate\Http\UploadedFile;

class CreatePostDTO
{

    use FilterArrayTrait;

    public function __construct(
        public PostVO $vo,
        public ?UploadedFile $file,
    ) {}

    public static function make(

        PostVO $vo,
        ?UploadedFile $file,

    ) : self {

        return new self(
            vo: $vo,
            file: $file,
        );

    }

}
