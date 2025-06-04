<?php

namespace App\Modules\User\App\Providers;

use App\Modules\User\Presentation\web\Livewire\MessagesPersonal;
use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;
use App\Modules\User\Presentation\web\Livewire\ProgresSkillBar;
use App\Modules\User\Presentation\web\Livewire\ProfileSkillCheck;
use App\Modules\User\Presentation\web\Livewire\ProfileAboutComponent;
use App\Modules\User\Presentation\web\Livewire\ProfileInfoUserComponent;
use App\Modules\User\Presentation\web\Livewire\ProfileInfoUserPostsComponent;

class UserServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

        Livewire::component('profile-info-user-component', ProfileInfoUserComponent::class);
        Livewire::component('profile-info-user-posts-component', ProfileInfoUserPostsComponent::class);


        Livewire::component('profile-about-component', ProfileAboutComponent::class);
        Livewire::component('profile-skill-check', ProfileSkillCheck::class);
        Livewire::component('progres-skill-bar', ProgresSkillBar::class);

        Livewire::component('message-personal', MessagesPersonal::class);

        if($this->app->runningInConsole()){


            $this->loadMigrationsFrom(dirname(__DIR__) . '/..' . '/Common' . '/Database' . "/Migrations");

        }
    }
}
