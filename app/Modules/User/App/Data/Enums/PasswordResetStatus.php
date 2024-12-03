<?php

namespace App\Modules\Email\App\Data\Enums;

enum PasswordResetStatus : string
{
    case pending = 'pending';

    case completed = 'completed';

    case expired = 'expired';
}
