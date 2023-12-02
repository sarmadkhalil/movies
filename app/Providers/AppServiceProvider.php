<?php

namespace App\Providers;

use App\Services\External\Movie\Impl\MovieExternalServiceTmdbImpl;
use App\Services\External\Movie\MovieExternalService;
use App\Services\Internal\Movie\Impl\MovieInternalServiceImpl;
use App\Services\Internal\Movie\MovieInternalService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MovieExternalService::class, function($app, $param) {
            if(env('MOVIE_EXTERNAL_PACKAGE') == 'Tmdb') {
                return new MovieExternalServiceTmdbImpl();
            }
        });

        $this->app->bind(MovieInternalService::class, function($app, $param) {
            // dd("Binding MovieInternalService");
                return new MovieInternalServiceImpl();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
