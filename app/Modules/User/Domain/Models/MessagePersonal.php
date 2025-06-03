<?php

namespace App\Modules\User\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Modules\User\Domain\Factories\MessagePersonalFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MessagePersonal extends Model
{
    use HasFactory;

    protected $table = 'message_personal';

    protected static function newFactory()
    {
        return MessagePersonalFactory::new();
    }

    protected $fillable = [

        "chat_personal_id",
        "user_id",
        "message",

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

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
