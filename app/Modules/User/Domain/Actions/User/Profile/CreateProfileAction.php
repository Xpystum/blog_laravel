<?php

namespace App\Modules\User\Domain\Actions\User;

use Exception;
use App\Modules\User\Domain\Models\Profile;
use App\Modules\User\App\Data\ValueObject\ProfileVO;

class CreateUserAction
{

    /**
     * @param ProfileVO $dto
     *
     * @return Profile
     */
    public static function make(ProfileVO $dto) : Profile
    {
        return (new self)->run($dto);
    }

    /**
     * @param ProfileVO $data
     *
     * @return Profile
     */
    public static function run(ProfileVO $data) : Profile
    {
        try {

            $model = Profile::query()->create($data->toArrayNotNull());

            return $model;

        } catch (\Throwable $th) {

            logError($th, [$data]);
            throw new Exception('Ошибка при создании User в CreateUserAction.', 500);

        }
    }

}
