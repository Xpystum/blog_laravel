<?php

namespace App\Modules\User\App\Data\ValueObject;

use Illuminate\Support\Arr;
use Illuminate\Contracts\Support\Arrayable;
use App\Modules\Base\Traits\FilterArrayTrait;
use App\Modules\User\App\Data\Enums\UserTypeEnum;

readonly class ProfileVO implements Arrayable
{

    use FilterArrayTrait;

    public function __construct(

        public string $url_avatar,
        public UserTypeEnum $type,
        public int $user_id,

        public ?string $full_name,
        public ?string $about,

    ) {}

    public static function make(

        string $url_avatar,
        string $type,
        string $user_id,
        ?string $full_name = null,
        ?string $about = null,

    ) : self {


        return new self(
            full_name: $full_name,
            url_avatar: $url_avatar,
            type: UserTypeEnum::stringToEnum($type),
            user_id: $user_id,
            about: $about,
        );

    }

    public function toArray() : array
    {
        return [
            "full_name" => $this->full_name,
            "about" => $this->about,
            "url_avatar" => $this->url_avatar,
            "type" => $this->type,
            "user_id" => $this->user_id,
        ];
    }

    public static function arrayToObject(array $data) : self
    {
        return self::make(
            full_name: Arr::get($data, 'full_name', null),
            about: Arr::get($data, 'about', null),
            url_avatar: Arr::get($data, 'userurl_avatar_id', null),
            type: Arr::get($data, 'type'),
            user_id: Arr::get($data, 'user_id'),
        );
    }

}
