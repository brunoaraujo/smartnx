<?php

namespace SmartNx\Providers\MenuItem;

use Illuminate\Support\Facades\Facade;

class MenuItemFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'MenuItem';
    }
}
