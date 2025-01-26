<?php

declare(strict_types=1);

namespace Ichinya\FontAwesome\Components;


use Illuminate\View\ComponentSlot;
use MoonShine\Support\Enums\Color;
use MoonShine\UI\Components\MoonShineComponent;

/**
 * @method static static make(string $icon = '', string|Color $color = 'black', string $class = '')
 */
class FontAwesome extends MoonShineComponent
{

    protected string $view = 'moonshine-fontawesome::components.fontawesome';


    public function __construct(
        public string       $icon = '',
        public string|Color $color = 'black',
        public string       $class = '',
    )
    {
        $this->icon = $this->sanitizeIcon($icon);
        parent::__construct();
    }

    protected function sanitizeIcon(string $icon): string
    {
        if (preg_match('/<i class="([^"]+)"><\/i>/', $icon, $matches)) {
            return $matches[1];
        }
        return $icon;
    }

    /**
     * @return array<string, mixed>
     */
    protected function viewData(): array
    {
        return [
            'slot' => new ComponentSlot($this->icon),
        ];
    }

    public function toString(): string
    {
        try {
            return $this->__toString();
        } catch (\Exception $e) {
            return '';
        }
    }

    public function __toString(): string
    {
        return (string)value($this->render(), $this);
    }

}
