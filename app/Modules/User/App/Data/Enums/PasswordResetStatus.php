<?php

namespace App\Modules\User\App\Data\Enums;

enum PasswordResetStatus : string
{
    case pending = 'pending';

    case completed = 'completed';

    case expired = 'expired';
}
