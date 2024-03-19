<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [

        'user_id',

        'title',

        'content',

        'published',

        'published_at',

        'pathImg_id',

    ];

    protected $casts = [

        'published' => 'boolean',
        'published_at' => 'datetime',

    ];


    public function isPublished(): bool
    {
        return $this->published
            && $this->published_at;
    }

    protected function SerializeDate(DateTimeInterface $date): string
    {
        return Carbon::parse($date);
    }

    public function img(): HasOne
    {
        return $this->hasOne(PostImg::class, 'pathImg_id');
    }

}
