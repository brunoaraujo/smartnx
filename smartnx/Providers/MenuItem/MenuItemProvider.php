<?php

namespace SmartNx\Providers\MenuItem;

use Illuminate\Support\ServiceProvider;

class MenuItemProvider extends ServiceProvider
{
    public function boot()
    {
        if (is_dir(__DIR__ . '/views')) {
            $this->loadViewsFrom(__DIR__ . '/views', 'MenuItem');
        }

        $this->app->singleton('MenuItem', function ($app) {
            return new MenuItem($app);
        });
    }
}
