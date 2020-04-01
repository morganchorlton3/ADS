<?php

namespace App\Providers;

use App;

use Illuminate\Support\ServiceProvider;

class DirectionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('directions', function()
        {
            return new \App\Http\Controllers\DirectionsController;

        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
