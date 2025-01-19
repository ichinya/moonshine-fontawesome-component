<?php declare(strict_types=1);

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
        parent::__construct();
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
