<?php

namespace App\Modules\User\App\Data\DTO\Profile;

use App\Modules\Base\Traits\FilterArrayTrait;
use App\Modules\User\Domain\Models\User;
use Illuminate\Support\Arr;

class UpdateProfileDTO
{

    use FilterArrayTrait;

    public function __construct(

        public ?User $user,
        public ?string $full_name,
        public ?string $email,
        public ?string $type,
        public ?array $contact,
        public ?string $my_project_tagify,
        public ?string $password,

    ) {}

    public function setUser(User $user)
    {
        return self::make(
            user: $user,
            full_name: $this->full_name,
            email: $this->email,
            type: $this->type,
            contact: $this->contact,
            my_project_tagify: $this->my_project_tagify,
            password: $this->password,
        );
    }

    public static function make(

        ?User $user,
        ?string $full_name,
        ?string $email,
        ?string $type,
        ?array $contact,
        ?string $my_project_tagify,
        ?string $password,

    ) : self {

        return new self(
            user: $user,
            full_name: $full_name,
            email: $email,
            type: $type,
            contact: $contact,
            my_project_tagify: $my_project_tagify,
            password: $password,
        );

    }

    public static function arrayToObject(array $data) : self
    {
        return self::make(
            user: Arr::get($data, 'user', null),
            full_name: Arr::get($data, 'full_name', null),
            email: Arr::get($data, 'email', null),
            type: Arr::get($data, 'type', null),
            contact: Arr::get($data, 'contact', null),
            my_project_tagify: Arr::get($data, 'my_project_tagify', null),
            password: Arr::get($data, 'password', null),
        );
    }

}
