<?php

namespace App\Modules\Post\Domain\Models;

use App\Modules\User\Domain\Actions\User\Avatar\GetAvatarAction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected static function newFactory()
    // {
    //     return UserFactory::new();
    // }

    protected $fillable = [

    ];

    protected $guarded = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

}
