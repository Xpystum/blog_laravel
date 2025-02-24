<?php

namespace App\Modules\Post\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LikeForPost extends Model
{
    use HasFactory;

    protected $table = 'like_for_posts';

    protected static function newFactory()
    {
        // return CommentFactory::new();
    }

    protected $fillable = [
        "post_id",
        "user_id",
        "user_agent",
        "status",
        "ip",
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

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
