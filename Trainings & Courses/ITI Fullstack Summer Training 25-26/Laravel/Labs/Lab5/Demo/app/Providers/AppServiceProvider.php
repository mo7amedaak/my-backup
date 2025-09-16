<?php

namespace App\Providers;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        Route::middleware('api')
        ->prefix('api')
        ->group(base_path('routes/api.php'));

        Route::middleware('web')
        ->group(base_path('routes/web.php'));
    }
}
