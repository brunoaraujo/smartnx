<?php

namespace SmartNx\Providers\ActionButton;

class GroupButton
{
    protected $buttons = [];
    protected $type = 'buttons';

    public function __construct($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setButton(Button $button)
    {
        $this->buttons[] = $button;
        return $this;
    }

    public function getButtons()
    {
        return $this->buttons;
    }

    public function getType()
    {
        return $this->type;
    }
}
