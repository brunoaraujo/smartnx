<?php

namespace SmartNx\Providers\ActionButton;

use Illuminate\Support\Facades\Facade;

class ActionButtonFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ActionButton';
    }
}
