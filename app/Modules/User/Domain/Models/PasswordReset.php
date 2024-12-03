<?php

namespace App\Modules\User\Domain\Models;

use App\Modules\Base\Traits\HasUuid;
use App\Modules\Email\App\Data\Enums\PasswordResetStatus;
use App\Modules\User\Domain\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PasswordReset extends Model
{
    use HasUuid;

    protected $table = 'password_resets';

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected $fillable = [
        'uuid',
        'value_email',
        'status',
        'user_id',
        'expires_at',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [

    ];

    protected $casts = [
        'status' => PasswordResetStatus::class,
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
