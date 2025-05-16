<?php

namespace App\Modules\Base\Enums;

enum ActiveStatusEnum : string
{
    case pending = 'pending';

    case completed = 'completed';

    case canceled = 'canceled';

}
