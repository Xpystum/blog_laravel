<?php

namespace App\Modules\User\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\User\App\Data\Enums\UserTypeEnum;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Modules\User\Domain\Factories\ProfileFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\User\Domain\Actions\User\Avatar\GetAvatarAction;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected static function newFactory()
    {
        return ProfileFactory::new();
    }

    protected $fillable = [
        "full_name",
        "url_avatar",
        "type",
        "user_id",
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [

    ];

    protected $casts = [
        "type" => UserTypeEnum::class,
    ];

    protected static function booted(): void
    {
        static::creating(function (Profile $model) {


            //устанавливаем аватар для пользователя поумолчанию
            $model->url_avatar = GetAvatarAction::make();

        });
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'profile_id', 'id');
    }

    public function skills() : HasMany
    {
        return $this->hasMany(Skill::class, 'profile_id', 'id');
    }

    public function contacts() : HasMany
    {
        return $this->hasMany(Contact::class, 'profile_id', 'id');
    }

    public function project() : HasOne
    {
        return $this->hasOne(Project::class, 'profile_id', 'id');
    }

}
