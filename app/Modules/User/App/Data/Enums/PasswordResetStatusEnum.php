<?php

namespace App\Modules\User\App\Data\Enums;

enum PasswordResetStatusEnum : string
{
    case pending = 'pending';

    case completed = 'completed';

    case expired = 'expired';

    public function is(PasswordResetStatusEnum $enum) : bool
    {
        return $this === $enum ? true : false;
    }
}
