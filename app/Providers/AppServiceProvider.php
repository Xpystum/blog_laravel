<?php

namespace App\Providers;

use Dflydev\DotAccessData\Data;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //расшарить переменную на все шаблоны блейда
        View::share('date', date('Y'));

        //расшарить переменную только на маршруты начинающийся с user 
        View::composer('user*', function($view){
            $view->with('balance', 12345);
        });


        Paginator::useBootstrapFive();
    }
}
