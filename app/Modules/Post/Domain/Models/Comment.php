<?php

namespace App\Modules\Post\Domain\Models;

use App\Modules\Post\Domain\Factories\CommentFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Post\Domain\Factories\PostFactory;
use App\Modules\User\Domain\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected static function newFactory()
    {
        return CommentFactory::new();
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

    public function post() : BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
