<?php

namespace App\Modules\User\Domain\Models;

use Laravel\Sanctum\HasApiTokens;
use Database\Factories\UserFactory;
use App\Modules\Post\Domain\Models\Post;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'password',

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
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function posts() : HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function profile() : HasOne
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }


}
