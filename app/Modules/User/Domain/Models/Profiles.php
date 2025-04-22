<?php

namespace App\Modules\User\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Post\Domain\Models\Contract;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    // protected static function newFactory()
    // {
    //     return PostFactory::new();
    // }

    protected $fillable = [
        "full_name",
        "url_avatar",
        "type",
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'profile_id', 'id');
    }

    public function skills() : HasMany
    {
        return $this->hasMany(Skill::class, 'profile_id', 'id');
    }

    public function contracts() : HasMany
    {
        return $this->hasMany(Contract::class, 'profile_id', 'id');
    }

    public function projects() : HasMany
    {
        return $this->hasMany(Project::class, 'profile_id', 'id');
    }

}
