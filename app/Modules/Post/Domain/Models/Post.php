<?php

namespace App\Modules\Post\Domain\Models;

use Livewire\Wireable;
use Illuminate\Database\Eloquent\Model;
use App\Modules\User\Domain\Models\User;
use App\Modules\Post\Domain\Factories\PostFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model implements Wireable
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

    public function likes() : HasMany
    {
        return $this->hasMany(LikeForPost::class, 'post_id', 'id');
    }

    public function postViews() : HasMany
    {
        return $this->hasMany(PostView::class, 'post_id', 'id');
    }

    public function toLivewire()
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "content_cover" => $this->content_cover,
            "user_id" => $this->user_id,
            'name' => $this->name,
            'age' => $this->age,
        ];
    }

    public static function fromLivewire($value)
    {

        dd($value);

        return static::findOrFail($value['id']);
    }

}
