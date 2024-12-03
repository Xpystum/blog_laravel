<?php

namespace App\Modules\User\Domain\Models;

use App\Modules\User\App\Data\Enums\UserTypeEnum;
use App\Modules\User\Domain\Actions\User\Avatar\GetAvatarAction;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
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
        'url_avatar',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
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

    protected static function booted(): void
    {
        static::creating(function (User $user) {

            //устанавливаем аватар для пользователя поумолчанию
            $user->url_avatar = GetAvatarAction::make();

        });
    }
}
