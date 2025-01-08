<?php

namespace App\Modules\StorageFile\App\Providers;

use Illuminate\Support\ServiceProvider;


class StorageFileServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // if($this->app->runningInConsole()){
        //     $this->loadMigrationsFrom(dirname(__DIR__) . '/..' . '/Common' . '/Database' . "/Migrations");
        // }
    }
}
