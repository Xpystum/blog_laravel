<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PostImg extends Model
{
    use HasFactory;

    protected $table = 'post_img';

    protected $fillable = [

        'pathImg', 'alt'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

}


