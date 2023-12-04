<?php

namespace App\Providers;

use App\Services\External\Movie\Impl\MovieExternalServiceTmdbImpl;
use App\Services\External\Movie\MovieExternalService;
use App\Services\Internal\Movie\Impl\MovieInternalServiceImpl;
use App\Services\Internal\Movie\MovieInternalService;
use App\Services\Internal\Rating\Impl\RatingServiceImpl;
use App\Services\Internal\Rating\RatingService;
use App\Services\Internal\Recommendation\Impl\RecommendationServiceImpl;
use App\Services\Internal\Recommendation\RecommendationService;
use App\Services\Internal\User\Impl\UserServiceImpl;
use App\Services\Internal\User\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(MovieExternalService::class, function ($app, $param) {
            if (env('MOVIE_EXTERNAL_PACKAGE') == 'Tmdb') {
                return new MovieExternalServiceTmdbImpl();
            }
        });

        $this->app->bind(MovieInternalService::class, function ($app, $param) {
            return new MovieInternalServiceImpl();
        });

        $this->app->bind(RatingService::class, function ($app, $param) {
            return new RatingServiceImpl();
        });

        $this->app->bind(RecommendationService::class, function ($app, $param) {
            return new RecommendationServiceImpl();
        });

        $this->app->bind(UserService::class, function ($app, $param) {
            return new UserServiceImpl();
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
