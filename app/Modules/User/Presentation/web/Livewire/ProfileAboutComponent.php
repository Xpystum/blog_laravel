<?php

namespace App\Modules\User\Presentation\web\Livewire;

use Livewire\Component;
use App\Modules\User\Domain\Models\Profile;
use App\Modules\User\App\Data\ValueObject\ProfileVO;
use App\Modules\User\Domain\Services\ProfileService;

class ProfileAboutComponent extends Component
{

    public ?string $message;
    public Profile $profile;

    public function mount($message, $profile)
    {

        $this->message = $message;
        $this->profile = $profile;
    }

    public function updatedMessage(ProfileService $profileSerivce)
    {

        /** @var ProfileVO */
        $profileVO = ProfileVO::toValueObject($this->profile)->setAbout($this->message);

        $status = $profileSerivce->updateProfile($this->profile, $profileVO);

        if($status) {
            $this->dispatch('messageChangedProfile', $this->message);
        }

    }


    public function render()
    {
        return view('livewire.profile.profile-about-component');
    }
}
