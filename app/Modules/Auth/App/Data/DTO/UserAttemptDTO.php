<?php
namespace App\Modules\Auth\App\Data\DTO;

use App\Modules\Base\Traits\FilterArrayTrait;

class UserAttemptDTO extends BaseDTO
{

    use FilterArrayTrait;

    public function __construct(

        public readonly ?string $phone,

        public readonly ?string $email,

        public readonly ?string $login,

        public readonly ?bool $remember,

        public readonly string $password,

    ) { }

    public static function make(
        string $password,
        bool $remember = false,
        ?string $phone = null,
        ?string $email = null,
        ?string $login = null,
    ) : self {
        return new self(
            phone : $phone,
            email : $email,
            login : $login,
            remember : $remember,
            password : $password,
        );
    }

    public function toArray(): array
    {

        return [
            'email' => $this->email,
            'login' => $this->login,
            'phone' => $this->phone,
            'remember' => $this->remember,
            'password' => $this->password,
        ];

    }
}
