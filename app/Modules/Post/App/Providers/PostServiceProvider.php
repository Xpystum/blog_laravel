<?php

namespace App\Modules\Post\App\Providers;

use App\Modules\Post\Presentation\web\Livewire\Like\LikePostComponent;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class PostServiceProvider extends ServiceProvider
{
    public function boot(): void
    {

        Livewire::component('post-like-component', LikePostComponent::class);

        if($this->app->runningInConsole()){
            $this->loadMigrationsFrom(dirname(__DIR__) . '/..' . '/Common' . '/Database' . "/Migrations");
        }
    }
}
