<?php

namespace App\Modules\User\Domain\Actions\User\Profile;

use Exception;
use App\Modules\User\Domain\Models\Profile;
use App\Modules\User\App\Data\ValueObject\ProfileVO;

class UpdateProfileAction
{

    /**
     * @param ProfileVO $dto
     *
     * @return Profile
     */
    public static function make(Profile $profile , ProfileVO $vo) : Profile
    {
        return (new self)->run($profile, $vo);
    }

    /**
     * @param ProfileVO $data
     *
     * @return Profile
     */
    public static function run(Profile $model , ProfileVO $vo) : Profile
    {
        try {

            //обновляем атрибуты модели через fill
            $model->fill($vo->toArrayNotNull());

            //проверяем данные на 'грязь' - если данные отличаются от старого состояние модели, то обновляем сущность
            if ($model->isDirty()) { $model->save(); $model->refresh(); }

        } catch (\Throwable $th) {

            $nameClass = self::class;

            logError("Ошибка в {$nameClass} при создании записи: " . $th);
            throw new Exception('Ошибка в классе: ' . $nameClass, 500);

        }

        return $model;
    }

}
