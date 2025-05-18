<?php

namespace App\Modules\User\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckSkill extends Model
{
    use HasFactory;

    protected $table = 'check_skills';

    // protected static function newFactory()
    // {
    //     return PostFactory::new();
    // }

    protected $fillable = [

        "name",
        "status",
        "profile_id",

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


}
