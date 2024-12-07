<?php declare(strict_types=1);

namespace Ichinya\FontAwesome\Components;

use Illuminate\View\ComponentSlot;
use MoonShine\Components\MoonShineComponent;

/**
 * @method static static make(string $icon = '', string $color = 'black', string $class = '')
 */
class FontAwesome extends MoonShineComponent
{

    protected string $view = 'moonshine-fontawesome::components.fontawesome';


    public function __construct(
        public string $icon = '',
        public string $color = 'black',
        public string $class = '',
    )
    {

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

    private function getStyleFromDirectory(string $name): string
    {
        return match ($name) {
            'brands' => 'fab fa-',
            'regular' => 'far fa-',
            default => 'fas fa-'
        };
    }

    private function getDirectoryFromStyle(string $style): string
    {
        return match (true) {
            str_contains($style, 'fab fa-') => 'brands',
            str_contains($style, 'far fa-') => 'regular',
            default => 'solid',
        };
    }

    private function getShortName(string $name): string
    {
        return preg_replace('/fas fa-|fab fa-|far fa-/', '', $name);
    }


    public function __toString(): string
    {
        $r = $this->render();
        return (string) $r;
    }

}
