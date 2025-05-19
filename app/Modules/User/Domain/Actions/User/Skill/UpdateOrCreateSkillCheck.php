<?php

namespace App\Modules\User\Domain\Actions\User\Skill;

use Exception;
use App\Modules\User\Domain\Models\CheckSkill;
use App\Modules\User\App\Data\ValueObject\CheckSkillVO;

class UpdateOrCreateSkillCheck
{

    /**
     * @param CheckSkillVO $dto
     *
     * @return CheckSkill
     */
    public static function make(CheckSkillVO $vo) : CheckSkill
    {
        return (new self)->run($vo);
    }

    /**
     * @param CheckSkillVO $data
     *
     * @return CheckSkill
     */
    public static function run(CheckSkillVO $vo) : CheckSkill
    {
        try {

            $model = CheckSkill::where('profile_id', $vo->profile_id)->where('name', $vo->name)->first();

            if (!is_null($model)) {

                //обновляем атрибуты модели через fill
                $model->fill($vo->toArrayNotNull());

                //проверяем данные на 'грязь' - если данные отличаются от старого состояние модели, то обновляем сущность
                if ($model->isDirty()) { $model->save(); $model->refresh(); }

            } else {

                // Если запись не найдена, создаем её
                $model = CheckSkill::create($vo->toArrayNotNull());

            }

            return $model;

        } catch (\Throwable $th) {

            logError($th, [$vo]);
            throw new Exception('Ошибка при создании User в CreateSkillAction.', 500);

        }
    }

}
