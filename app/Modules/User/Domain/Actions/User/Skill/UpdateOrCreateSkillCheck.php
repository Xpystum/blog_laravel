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

            $model = CheckSkill::find($vo->profile_id);

            if (!is_null($model)) {

                $model->update($vo->toArrayNotNull());

            } else {

                // Если запись не найдена, создаем её
                CheckSkill::create($vo->toArrayNotNull());

            }

            return $model;

        } catch (\Throwable $th) {

            logError($th, [$vo]);
            throw new Exception('Ошибка при создании User в CreateSkillAction.', 500);

        }
    }

}
