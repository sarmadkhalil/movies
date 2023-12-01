<?php

namespace Sarmad\TmdbClient;

use Illuminate\Support\ServiceProvider;

class TmdbClientServiceProvider extends ServiceProvider
{
    public function boot() 
    {
        $this->publishes([
            __DIR__ . '/../config/tmdbconfig.php' => config_path('tmdbconfig.php')
        ]);
    }

    public function run()
    {
        $this->app->singleton(TmdbClient::class, function() {
            return new TmdbClient();
        });
    }
}
