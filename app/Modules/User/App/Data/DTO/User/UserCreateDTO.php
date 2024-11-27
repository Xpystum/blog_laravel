<?php

namespace App\Modules\User\App\Data\DTO\User;

use App\Modules\Base\Traits\FilterArrayTrait;
use App\Modules\User\App\Data\Enums\UserTypeEnum;
use Illuminate\Contracts\Support\Arrayable;

final readonly class UserCreateDTO implements Arrayable
{

    use FilterArrayTrait;

    public function __construct(
        public string $login,
        public string $email,
        public UserTypeEnum $type,
        public string $password,
        public ?string $url_avatar,
    ) {}

    public static function make(
        string $login,
        string $type ,
        string $email,
        string $password,
        ?string $url_avatar = null,
    ) : self {

        return new self(
            login: $login,
            email: $email,
            type: UserTypeEnum::stringToEnum($type),
            password: $password,
            url_avatar: $url_avatar,
        );

    }

    public function setUrlAvatar(string $url_avatar) : self
    {
        return self::make(
            login: $this->login,
            type: $this->type->value,
            email: $this->email,
            password: $this->password,
            url_avatar: $url_avatar,
        );
    }

    public function toArray() : array
    {
        return [
            "login" => $this->login,
            "email" => $this->email,
            "type" =>  $this->type?->value,
            "password" => $this->password,
            "url_avatar" => $this->url_avatar,
        ];
    }

}
