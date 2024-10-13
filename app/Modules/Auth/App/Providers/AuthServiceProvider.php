<?php
namespace App\Modules\Auth\App\Providers;

use App\Modules\Auth\App\Data\Drivers\AuthSanctum;
use App\Modules\Auth\App\Data\Drivers\AuthSanctumCookie;
use App\Modules\Auth\Common\Config\AuthConfig;
use App\Modules\Auth\Domain\Services\AuthService;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Foundation\Application;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {

        //Указываем config при guard web при использовании sanctum cookie
        $this->app->singleton(AuthConfig::class, function (Application $app) {
            return AuthConfig::make('web');
        });

        $this->app->singleton(AuthSanctumCookie::class, function (Application $app) {
            return new AuthSanctumCookie($app->make(AuthConfig::class));
        });

        $this->app->singleton(AuthService::class, function (Application $app) {
            return new AuthService($app->make(AuthSanctumCookie::class));
        });

    }
}
