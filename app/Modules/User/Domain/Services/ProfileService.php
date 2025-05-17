<?php

namespace App\Modules\User\Domain\Services;

use App\Modules\User\Domain\Models\Profile;
use App\Modules\User\App\Data\ValueObject\ProfileVO;
use App\Modules\User\App\Data\DTO\Profile\UpdateProfileDTO;
use App\Modules\User\Domain\Actions\User\Profile\UpdateProfileAction;
use App\Modules\User\Domain\Interactor\Profile\UpdateProfileInteractor;

class ProfileService
{
    public function __construct(
        private UpdateProfileInteractor $updateProfileInteractor
    ) { }


    /**
     * Расширенное обновление профиля + его связи
     * @param UpdateProfileDTO $dto
     *
     * @return Profile
     */
    public function updateProfileGeneral(UpdateProfileDTO $dto) : Profile
    {
        return $this->updateProfileInteractor->execute($dto);
    }


    public function updateProfile(Profile $profile, ProfileVO $profileVO) : Profile
    {
        return UpdateProfileAction::make($profile, $profileVO);
    }
}

