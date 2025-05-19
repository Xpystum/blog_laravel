<?php

namespace App\Modules\User\Presentation\web\Livewire;

use App\Modules\User\App\Data\ValueObject\CheckSkillVO;
use App\Modules\User\Domain\Actions\User\Skill\UpdateOrCreateSkillCheck;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ProfileSkillCheck extends Component
{
    public Collection $checkSkills;
    public $selectedItems = [];
    public int $profileId;

    public function mount(int $profileId)
    {
        if( !empty($this->checkSkills) )
        {

            foreach ($this->checkSkills as $value) {
                $this->selectedItems[$value->name] = $value->status;
            }

        }

        $this->profileId = $profileId;
    }

    public function updatedSelectedItems($value, $key)
    {

        if(!empty($this->selectedItems))
        {
            foreach ($this->selectedItems as $key => $value) {
                UpdateOrCreateSkillCheck::make(CheckSkillVO::make(
                    name: $key,
                    status: $value,
                    profile_id: $this->profileId,
                ));
            }
        }

    }

    public function setValue(?string $key) {

        if(is_null($key)) { return ""; }

        $result = $this->selectedItems[$key] ?? null;

        if(is_null($result)) { return ""; }

        return $result;
    }

    public function render()
    {
        return view('livewire.profile.profile-skill-check');
    }
}
