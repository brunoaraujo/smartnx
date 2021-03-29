<?php

namespace SmartNx\Providers\ActionButton;

use Illuminate\Support\ServiceProvider;

class ActionButtonProvider extends ServiceProvider
{
    public function boot()
    {
        if (is_dir(__DIR__ . '/views')) {
            $this->loadViewsFrom(__DIR__ . '/views', 'ActionButton');
        }

        $this->app->singleton('ActionButton', function ($app) {
            return new ActionButton($app);
        });
    }
}
