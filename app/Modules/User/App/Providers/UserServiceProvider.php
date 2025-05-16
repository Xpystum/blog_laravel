<?php

namespace App\Modules\User\App\Providers;

use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use App\Modules\User\Presentation\web\Livewire\ProfileAboutComponent;
use App\Modules\User\Presentation\web\Livewire\ProfileInfoUserComponent;
use App\Modules\User\Presentation\web\Livewire\ProfileSkillCheck as LivewireProfileSkillCheck;

class UserServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

        Livewire::component('profile-info-user-component', ProfileInfoUserComponent::class);
        Livewire::component('profile-about-component', ProfileAboutComponent::class);
        Livewire::component('profile-skill-check', LivewireProfileSkillCheck::class);

        if($this->app->runningInConsole()){


            $this->loadMigrationsFrom(dirname(__DIR__) . '/..' . '/Common' . '/Database' . "/Migrations");

        }
    }
}
