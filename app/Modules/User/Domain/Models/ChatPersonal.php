<?php

namespace App\Modules\User\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\User\Domain\Factories\ChatPersonalFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChatPersonal extends Model
{
    use HasFactory;

    protected $table = 'chat_personal';

    protected static function newFactory()
    {
        return ChatPersonalFactory::new();
    }

    protected $fillable = [

        "user1_id",
        "user2_id",


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

    public function userOne() : BelongsTo
    {
        return $this->belongsTo(Profile::class, 'user2_id');
    }

    public function userTwo() : BelongsTo
    {
        return $this->belongsTo(Profile::class, 'user1_id');
    }

     public function messagePersonal() : HasMany
    {
        return $this->hasMany(MessagePersonal::class, 'chat_personal_id', 'id');
    }

    public function lastMessage() : HasMany
    {
        return $this->hasMany(MessagePersonal::class, 'chat_personal_id', 'id')
            ->latest()
            ->limit(1);
    }


}
