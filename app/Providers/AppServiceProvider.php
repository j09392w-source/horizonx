<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <-- 1. Agrega esta línea

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
        // 2. Obligamos a Laravel a usar HTTPS en el entorno de producción
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }
}