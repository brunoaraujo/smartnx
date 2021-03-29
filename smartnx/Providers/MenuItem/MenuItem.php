<?php

namespace SmartNx\Providers\MenuItem;

class MenuItem
{
    protected $request;
    protected $auth;

    public function __construct($app)
    {
        $this->request = $app['request'];
        $this->auth = $app['auth'];
    }

    public function render()
    {
        $menu = config('menu');
        return view('MenuItem::menuitem', ['itens' => $menu]);
    }
}
