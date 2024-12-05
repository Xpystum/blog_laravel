<?php

namespace App\Modules\User\App\Data\Enums;

enum PasswordResetStatusEnum : string
{
    case pending = 'pending';

    case completed = 'completed';

    case expired = 'expired';
}
