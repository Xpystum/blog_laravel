<?php

namespace App\Modules\Post\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LikeForComment extends Model
{
    use HasFactory;

    protected $table = 'like_for_comments';

    protected static function newFactory()
    {
        // return CommentFactory::new();
    }

    protected $fillable = [
        "post_id",
        "user_id",
        "value",
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
