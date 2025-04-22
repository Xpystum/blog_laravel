<?php

namespace App\Modules\User\Domain\Actions\User\Skill;

use Exception;
use App\Modules\User\Domain\Models\Skill;
use App\Modules\User\App\Data\ValueObject\SkillVO;

class CreateSkillAction
{

    /**
     * @param SkillVO $dto
     *
     * @return Skill
     */
    public static function make(SkillVO $vo) : Skill
    {
        return (new self)->run($vo);
    }

    /**
     * @param SkillVO $data
     *
     * @return Skill
     */
    public static function run(SkillVO $vo) : Skill
    {
        try {

            $model = Skill::query()->create($vo->toArrayNotNull());

            return $model;

        } catch (\Throwable $th) {

            logError($th, [$vo]);
            throw new Exception('Ошибка при создании User в CreateUserAction.', 500);

        }
    }

}
