<?php

namespace SmartNx\Providers\Permission;

use Illuminate\Support\ServiceProvider;

class PermissionProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->singleton('Permission', function ($app) {
            return new Permission($app);
        });
    }
}
