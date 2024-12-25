<?php

namespace Ichinya\FontAwesome\Components;

use Ichinya\FontAwesome\Traits\WithAwesomeIcon;
use MoonShine\Support\Enums\Color;

class MenuItem extends \MoonShine\MenuManager\MenuItem
{
    use WithAwesomeIcon;

    public function getCustomColor(): Color|string|null
    {
        return Color::SECONDARY;
    }
}
