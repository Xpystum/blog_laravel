<?php

namespace App\Modules\Email\Domain\Models;

use App\Modules\Base\Traits\HasUuid;
use App\Modules\Email\App\Data\Enums\EmailStatusEnum;
use Illuminate\Database\Eloquent\Model;

class EmailAccesToken extends Model
{
    use HasUuid;

    protected $fillable = [
        'uuid',
        'value',
        'status',
        'user_id',
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'status' => EmailStatusEnum::class,
    ];
}
