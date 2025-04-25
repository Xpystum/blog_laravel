<?php

namespace App\Modules\User\Domain\Interactor\Profile;

use App\Modules\User\App\Data\DTO\Profile\UpdateProfileDTO;
use App\Modules\User\App\Data\ValueObject\ProfileVO;
use App\Modules\User\Domain\Models\Profile;
use Illuminate\Support\Facades\DB;

class UpdateProfileInteractor
{
    public function execute(UpdateProfileDTO $dto) : Profile
    {
        return $this->run($dto);
    }

    private function run(UpdateProfileDTO $dto) : Profile
    {
        /** @var Profile */
        $model = DB::transaction(function () use ($dto) {

            /** @var ProfileVO */
            $profileVO = $this->createProfileVO($dto);

            dd($profileVO);

        });

        return $model;
    }

    private function createProfileVO(UpdateProfileDTO $dto) : ProfileVO
    {

        $url_avatar = $dto->user->profile->url_avatar;

        return ProfileVO::make(
            full_name: $dto->full_name,
            url_avatar: $url_avatar,
            type: $dto->type,
            user_id: $dto->user->id,
        );
    }
}
