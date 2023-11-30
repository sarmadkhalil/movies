<?php

namespace Sarmad\TmdbClient;

use Illuminate\Support\ServiceProvider;

class TmdbClientServiceProvider extends ServiceProvider
{
    public function boot() 
    {
        dd("hello");
    }

    public function run()
    {
        
    }
}
