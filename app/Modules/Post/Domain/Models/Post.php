<?php

namespace App\Modules\Post\Domain\Models;

use App\Modules\Post\Domain\Factories\PostFactory;
use App\Modules\User\Domain\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected static function newFactory()
    {
        return PostFactory::new();
    }

    protected $fillable = [
        "title",
        "content",
        "content_cover",
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
        // 'content'=> CleanHtmlInput::class, //очищаем от потенциального опасного кода от xss атак
    ];

    /**
    * Ссылка на обложку статьи
    * @return HasOne
    */
    public function cover_img(): HasOne
    {
        return $this->hasOne(PostImageCover::class, 'post_id');
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

}
