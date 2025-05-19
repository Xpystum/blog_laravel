<?php

namespace App\Modules\User\Presentation\web\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\User\App\Data\ValueObject\CheckSkillVO;
use App\Modules\User\Domain\Actions\User\Skill\UpdateOrCreateSkillCheck;

class ProfileSkillCheck extends Component
{
    public Collection $checkSkills;
    public array $selectedItems = [];
    public int $profileId;

    public function mount(int $profileId)
    {
        if( !empty($this->checkSkills) )
        {

            foreach ($this->checkSkills as $value) {
                $this->selectedItems[$value->name] = $value->status;
            }

            $this->dispatch('skillcheckUpdate', $this->selectedItems);

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

            $this->dispatch('skillcheckUpdate', $this->selectedItems);
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
