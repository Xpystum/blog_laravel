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

    public function toArray() : array
    {
        return [
            "login" => $this->login,
            "email" => $this->email,
            "type" =>  $this->type?->value,
            "password" => $this->password,
        ];
    }

}
