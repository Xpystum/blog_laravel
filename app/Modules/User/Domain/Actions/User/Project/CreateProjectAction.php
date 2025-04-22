<?php

namespace App\Modules\User\Domain\Actions\User\Project;

use Exception;
use App\Modules\User\Domain\Models\Project;
use App\Modules\User\App\Data\ValueObject\ProjectVO;

class CreateProjectAction
{

    /**
     * @param ProjectVO $dto
     *
     * @return Project
     */
    public static function make(ProjectVO $dto) : Project
    {
        return (new self)->run($dto);
    }

    /**
     * @param ProjectVO $data
     *
     * @return Project
     */
    public static function run(ProjectVO $data) : Project
    {
        try {

            $model = Project::query()->create($data->toArrayNotNull());

            return $model;

        } catch (\Throwable $th) {

            logError($th, [$data]);
            throw new Exception('Ошибка при создании User в CreateUserAction.', 500);

        }
    }

}
