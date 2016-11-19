<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GorceryEmailClassServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
            $this->app->bind('groceryemailclass', function()
        {
            return new \App\Grocery\GroceryEmailClass;

        });
        //
    }
}
