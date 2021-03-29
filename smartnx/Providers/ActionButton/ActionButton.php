<?php

namespace SmartNx\Providers\ActionButton;

class ActionButton
{
    public static function render(GroupButton $groupButton)
    {
        return view('ActionButton::groupButtons', ['groupButton' => $groupButton]);
    }
}
