<?php

namespace App\Modules\User\Presentation\web\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileInfoUserComponent extends Component
{
    const DEFAULT_TABS = 'personal_info_user';
    public string $statusCheck;

    public $about;


    protected $listeners = ['messageChangedProfile' => 'refreshData'];

    public function refreshData($newValue)
    {
        // Можно обновить данные напрямую, либо повторно получить их из БД
        $this->about = $newValue;
    }

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
        $this->about = Auth::user()->profile->about ?? "Описание не заполнено.";

    }



    public function render()
    {
        return view('livewire.profile.profile-info-user');
    }
}
