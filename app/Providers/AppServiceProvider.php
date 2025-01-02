<?php

namespace App\Providers;

use App\Modules\User\App\Repositories\UserRepository;
use App\Modules\User\Domain\IRepository\IUserRepository;
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
        $this->app->bind(IUserRepository::class,  UserRepository::class);
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
