<?php

namespace App\Modules\Email\Domain\Models;

use App\Modules\Base\Traits\HasUuid;
use App\Modules\Email\App\Data\Enums\EmailStatusEnum;
use App\Modules\User\Domain\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailAccesToken extends Model
{
    use HasUuid;

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected $fillable = [
        'uuid',
        'value',
        'status',
        'user_id',
        'expires_at',
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'status' => EmailStatusEnum::class,
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
