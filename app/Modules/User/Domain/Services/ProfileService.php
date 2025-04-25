<?php

namespace App\Modules\User\Domain\Services;

use App\Modules\User\Domain\Models\Profile;
use App\Modules\User\App\Data\DTO\Profile\UpdateProfileDTO;
use App\Modules\User\Domain\Interactor\Profile\UpdateProfileInteractor;

class ProfileService
{
    public function __construct(
        private UpdateProfileInteractor $updateProfileInteractor
    ) { }


    public function updateProfile(UpdateProfileDTO $dto) : Profile
    {
        return $this->updateProfileInteractor->execute($dto);
    }
}

