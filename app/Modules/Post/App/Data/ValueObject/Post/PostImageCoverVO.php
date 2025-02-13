<?php

namespace App\Modules\Post\App\Data\ValueObject\Post;

use App\Modules\Base\Traits\FilterArrayTrait;
use Illuminate\Contracts\Support\Arrayable;


class PostImageCoverVO implements Arrayable
{

    use FilterArrayTrait;

    public function __construct(

        public int $post_id,
        public string $path_url,
        public string $original_name,
        public string $formed_name,
        public int $size,
        public ?string $mime_type = null,

    ) {}

    public static function make(

        int $post_id,
        string $path_url,
        string $original_name,
        string $formed_name,
        int $size,
        ?string $mime_type = null,


    ) : self {

        return new self(
            post_id: $post_id,
            path_url: $path_url,
            original_name: $original_name,
            formed_name: $formed_name,
            size: $size,
            mime_type: $mime_type,
        );

    }


    public function toArray() : array
    {
        return [
            "post_id" => $this->post_id,
            "path_url" => $this->path_url,
            "original_name" => $this->original_name,
            "formed_name" => $this->formed_name,
            "size" => $this->size,
            "mime_type" => $this->mime_type,
        ];
    }

}
