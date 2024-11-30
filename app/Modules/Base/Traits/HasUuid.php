<?php

namespace App\Modules\Base\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasUuid
{
    public static function bootHasUuid() : void
    {
        //forceFill - если поле в модели не прописано, в $fillable - то оно все равно заполнится
        static::creating(function (Model $model){

            $model->forceFill([
                'uuid' => uuid(),
            ]);

        });

    }
}
