<?php

namespace App\Modules\User\Domain\Actions\User\Project;

use Exception;

use App\Modules\User\Domain\Models\Project;
use App\Modules\User\App\Data\ValueObject\ProjectVO;
use App\Modules\User\Domain\Models\Profile;

class UpdateOrCreateProjectAction
{

    /**
     * @param ProjectVO $vo
     * @param int $profile_id
     *
     * @return Project
     */
    public static function make(?ProjectVO $vo, Profile $profile) : ?Project
    {
        return (new self)->run($vo, $profile);
    }

    /**
     * @param ProjectVO $vo
     * @param int $profile_id
     *
     * @return Project
     */
    public static function run(?ProjectVO $vo, Profile $profile) : ?Project
    {

        try {

            //очищаем запись полностью что бы переобновить, или полностью удалить.
            $profile->project()->delete();

            if(!is_null($vo))
            {
                $model = Project::create(
                    [
                        'project_json' => $vo->project_json,
                        'profile_id' => $vo->profile_id,
                    ],
                );
            }

            return $model ?? null;

        } catch (\Throwable $th) {

            dd($th);

            $nameClass = self::class;

            logError("Ошибка в {$nameClass} при создании записи: " . $th);
            throw new Exception('Ошибка в классе: ' . $nameClass, 500);

        }

        return $model;
    }

}
