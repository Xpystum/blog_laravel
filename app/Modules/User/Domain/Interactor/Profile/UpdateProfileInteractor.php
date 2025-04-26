<?php

namespace App\Modules\User\Domain\Interactor\Profile;

use Illuminate\Support\Facades\DB;
use App\Modules\User\Domain\Models\User;
use App\Modules\User\Domain\Models\Contact;
use App\Modules\User\Domain\Models\Profile;
use App\Modules\User\Domain\Models\Project;
use App\Modules\User\App\Data\ValueObject\ContactVO;
use App\Modules\User\App\Data\ValueObject\ProfileVO;
use App\Modules\User\App\Data\ValueObject\ProjectVO;
use App\Modules\User\App\Data\DTO\Profile\UpdateProfileDTO;
use App\Modules\User\Domain\Actions\User\Profile\UpdateProfileAction;
use App\Modules\User\Domain\Actions\User\Contact\UpdateOrCreateContactAction;
use App\Modules\User\Domain\Actions\User\Project\UpdateOrCreateProjectAction;

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

            /** @var User */
            $user = $dto->user;

            /** @var Profile */
            $profile = $this->updateProfileAction($user->profile, $profileVO);

            /** @var ?ProjectVO */
            $projectVO = $this->createProjectVO($dto, $profile->id);

            /** @var ?Project */
            $project = $this->UpdateOrCreateProjectAction($profile, $this->createProjectVO($dto, $profile->id));

            /** @var ?array */
            $array = $this->createContactVOArray($dto, $profile->id);

            if($array && !empty($array))
            {
                foreach ($this->createContactVOArray($dto, $profile->id) as $value) {
                    $contacts[] = $this->updateOrCreateContactAction($profile, $value);
                }
            }

            return $profile;

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

    private function createProjectVO(UpdateProfileDTO $dto, int $profile_id) : ?ProjectVO
    {

        if($dto->my_project_tagify === null) { return null; }

        return ProjectVO::make(
            project_json: $dto->my_project_tagify,
            profile_id: $profile_id,
        );
    }

    private function createContactVOArray(UpdateProfileDTO $dto, int $profile_id) : ?array
    {
        if($dto->contacts == null) { return null; }
        return ContactVO::arrayToObject($dto->contacts, $profile_id);
    }

    private function updateOrCreateProjectAction(Profile $profile, ?ProjectVO $vo) : ?Project
    {
        return UpdateOrCreateProjectAction::make($vo, $profile);
    }

    private function updateProfileAction(Profile $profile, ProfileVO $vo) : Profile
    {
        return UpdateProfileAction::make($profile, $vo);
    }

    private function updateOrCreateContactAction(Profile $profile, ContactVO $vo) : Contact
    {
        return UpdateOrCreateContactAction::make($vo, $profile->id);
    }

}
