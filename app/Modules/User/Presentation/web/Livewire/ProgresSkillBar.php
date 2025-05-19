<?php

namespace App\Modules\User\Presentation\web\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ProgresSkillBar extends Component
{

    public $inputValue;


    protected $listeners = ['updateValueProgressBar'];


    public function updateProgress($property)
    {
        dd($property);
    }

    // public function updated($property)
    // {
    //     dd(123);
    // }



    public function render()
    {
        return view('livewire.profile.progres-skill-bar');
    }
}
