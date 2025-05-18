<?php

namespace App\Modules\User\Presentation\web\Livewire;

use App\Modules\User\App\Data\ValueObject\CheckSkillVO;
use App\Modules\User\Domain\Actions\User\Skill\UpdateOrCreateSkillCheck;
use Livewire\Component;

class ProfileSkillCheck extends Component
{

    public $selectedItems = [];
    public int $profileId;

    public function updatedSelectedItems($value, $key)
    {

        foreach ($this->selectedItems as $key => $value) {
            UpdateOrCreateSkillCheck::make(CheckSkillVO::make(
                name: $key,
                status: $value,
                profile_id: $this->profileId,
            ));
        }

    }

    public function render()
    {
        return view('livewire.profile.profile-skill-check');
    }
}
