<?php

namespace App\Modules\User\Domain\Models;

use App\Modules\User\App\Data\Enums\UserTypeEnum;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected static function newFactory()
{
    return UserFactory::new();
}

    protected $fillable = [
        'login',
        'email',
        'type',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'type' => UserTypeEnum::class,
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
