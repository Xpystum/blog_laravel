<?php

namespace App\Modules\User\Presentation\web\Livewire;

use Livewire\Component;

class ProfileInfoUserComponent extends Component
{
    const DEFAULT_TABS = 'personal_info_user';
    public string $statusCheck;

    public function switch(string $value){
        if($value) {
            $this->statusCheck = $value;
            return;
        }

        $this->statusCheck = self::DEFAULT_TABS;
    }

    public function mount(

    ) {

        //устанавливаем дейолтный выбор для таба
        $this->statusCheck = 'personal_info_user';

    }



    public function render()
    {
        return view('livewire.profile.profile-info-user');
    }
}
