<?php

namespace App\Modules\User\Presentation\web\Livewire;

use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;
use App\Modules\User\App\Data\ValueObject\CheckSkillVO;
use App\Modules\User\Domain\Actions\User\Skill\UpdateOrCreateSkillCheck;

class ProfileSkillCheck extends Component
{
    public Collection $checkSkills;

    //прослойка пустого массива - для вызова метода при отправке на сервер данных
    public array $selectedItems = [];

    public $toggleItem = [];
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

    public function updatedSelectedItems()
    {

        // dd($this->toggleItem);

        if(!empty($this->toggleItem))
        {
            foreach ($this->toggleItem as $itemKey => $itemValue) {
                UpdateOrCreateSkillCheck::make(CheckSkillVO::make(
                    name: $itemKey,
                    status: $itemValue,
                    profile_id: $this->profileId,
                ));
            }

            $this->dispatch('skillcheckUpdate', $this->toggleItem);
        }

    }


    public function setValue(string $key) {


        $result = $this->selectedItems[$key] ?? null;

        if(is_null($result)) { return ""; }

    }

    public function render()
    {
        return view('livewire.profile.profile-skill-check');
    }
}
