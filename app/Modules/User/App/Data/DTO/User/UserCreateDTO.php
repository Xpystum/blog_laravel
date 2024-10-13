<?php

namespace App\Modules\User\App\Data\DTO\User;

use App\Modules\User\App\Data\Enums\UserTypeEnum;

class UserCreateDTO
{
    public function __construct(
        public string $login,
        public string $email,
        public UserTypeEnum $type,
        public string $password,
    ) {}

    public static function make(string $login, string $type , string $email, string $password) : self
    {
        return new self(
            login: $login,
            email: $email,
            type: UserTypeEnum::stringToEnum($type),
            password: $password,
        );
    }

}
