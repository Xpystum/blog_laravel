<?php

namespace App\Modules\User\Presentation\web\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ProgresSkillBar extends Component
{

    public $inputValue;

    // public function updatedInputValue()
    // {
    //     Log::info(123);
    // }

    public function updateInput($value)
    {
        dd($value);
        // Дополнительная логика
    }

    public function render()
    {
        return view('livewire.profile.progres-skill-bar');
    }
}
