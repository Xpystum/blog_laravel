<?php

namespace App\Modules\Setting\Domain\Models;

use App\Modules\Base\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = ['key', 'value', 'description'];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];


    public static function get($key, $default = null)
    {//возвращаем значение по ключу
        $setting = self::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    public static function set($key, $value, $description = null)
    {
        return self::updateOrCreate(
            ['key' => $key],   // Условие поиска существующей записи
            ['value' => $value, 'description' => $description],
        );
    }

}
