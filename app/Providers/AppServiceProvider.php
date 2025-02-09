<?php

namespace App\Providers;

use App\Modules\User\App\Repositories\UserRepository;
use App\Modules\User\Domain\IRepository\IUserRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Http\Controllers';

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

        //указываем тестовые маршруты для запусков в тестах p.s тесты не воспринимают наши routes
        $this->mapTestingRoutes();
    }

    protected function mapTestingRoutes()
    {
        if (! App::environment('testing')) {
            return ;
        }

        Route::middleware('web')->namespace($this->namespace)->group(base_path('routes/Tests/testing.php'));
    }
}
