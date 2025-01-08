<?php

namespace App\Modules\Post\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Casts\CleanHtmlInput;

class Post extends Model
{
    use HasFactory;

    // protected static function newFactory()
    // {
    //     return UserFactory::new();
    // }

    protected $fillable = [
        "title",
        "content",
        "path_img_cover_post",
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
        'content'=> CleanHtmlInput::class, //очищаем от потенциального опасного кода от xss атак
    ];

}
