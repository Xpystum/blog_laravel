<?php

namespace App\Modules\User\Presentation\web\Livewire;

use App\Modules\User\Domain\Models\Profile;
use App\Modules\User\Domain\Models\Skill;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Livewire\Component;

class ProfileInfoUserComponent extends Component
{
    const DEFAULT_TABS = 'personal_info_user';
    public string $statusCheck;

    public $about;
    public array $selectedItems = [];

    public Profile $profile;

    /**
     * skill bar
     * @var array
     */
    public array $skills;

    /**
     * Json проектов пользователя
     * @var string
    */
    public ?string $projectArray;

    // /**
    //  * Профессиональные навыки
    //  * @var SupportCollection
    //  */
    // public SupportCollection $inputValue;



    protected $listeners = [
        'messageChangedProfile' => 'aboutUpdate',
        'skillcheckUpdate' => 'skillcheckUpdate',
        'skillBar' => 'skillBarUpdate',
    ];

    public function skillBarUpdate($inputValue)
    {
        $this->skills = $inputValue;
    }

    public function skillcheckUpdate(array $selectedItems)
    {
        $this->selectedItems = $selectedItems;
    }

    public function aboutUpdate($newValue)
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

    public function mount(Profile $profile)
    {
        //устанавливаем дейолтный выбор для таба
        $this->statusCheck = 'personal_info_user';
        $this->about = $profile->about ?? "Описание не заполнено.";
        $this->profile = $profile;
        $this->skills = $profile->skills->toArray();
        $this->projectArray = $profile->project?->project_json ?? null;

    }



    public function render()
    {
        return view('livewire.profile.profile-info-user', [
            'profile' => $this->profile,
            'skills' => $this->skills,
            // 'projectArray' => $this->projectArray,
        ]);
    }
}
