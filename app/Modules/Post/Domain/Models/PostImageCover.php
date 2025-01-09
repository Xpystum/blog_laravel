<?php

namespace App\Modules\Post\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostImageCover extends Model
{
    protected $table = 'post_img_covers';

    use HasFactory;

    // protected static function newFactory()
    // {
    //     return UserFactory::new();
    // }

    protected $fillable = [
        "post_id",
        "path_url",
        "original_name",
        "formed_name",
        "mime_type",
        "size",
        "is_deleted",
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'is_deleted',
    ];

    protected $casts = [
        'is_deleted' => 'bolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

}
