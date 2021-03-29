<?php

namespace SmartNx\Providers\ActionButton;

class Button
{
    protected $label;
    protected $route;
    protected $icon;
    protected $class;
    protected $parameters = [];
    protected $target = '_self';

    public function __construct($label, $route, $icon, $class, $parameters = [], $target = 'self')
    {
        $this->label = $label;
        $this->route = $route;
        $this->icon = $icon;
        $this->class = $class;
        $this->parameters = $parameters;
        $this->target = $target;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function getClass()
    {
        return $this->class;
    }
}
