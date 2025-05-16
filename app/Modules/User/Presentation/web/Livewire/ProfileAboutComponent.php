<?php

namespace App\Modules\User\Presentation\web\Livewire;

use App\Modules\User\App\Data\DTO\Profile\UpdateProfileDTO;
use App\Modules\User\Domain\Models\Profile;
use App\Modules\User\Domain\Services\ProfileService;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ProfileAboutComponent extends Component
{

    public $message;

    public Profile $profile;

    public function updatedMessage(ProfileService $profileSerivce)
    {

        dd($this->profile);

        // $status = $profileSerivce->updateProfile(UpdateProfileDTO::make(

        // ));


        // Сохраняет сразу, когда $message обновлён
        // Пример: $this->user->update(['message' => $this->message]);
    }


    public function render()
    {
        return view('livewire.profile.profile-about-component');
    }
}
