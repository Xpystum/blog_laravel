<?php

namespace App\Modules\User\App\Providers;

use App\Modules\User\Presentation\web\Livewire\ProfileInfoUserComponent;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class UserServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

        Livewire::component('profile-info-user-component', ProfileInfoUserComponent::class);

        if($this->app->runningInConsole()){


            $this->loadMigrationsFrom(dirname(__DIR__) . '/..' . '/Common' . '/Database' . "/Migrations");

        }
    }
}
