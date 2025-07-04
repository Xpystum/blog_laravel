<?php

namespace App\Modules\User\Domain\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';


    protected $fillable = [
        "name",
        "url",
        "profile_id",
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


}
