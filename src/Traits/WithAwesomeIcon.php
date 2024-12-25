<?php
declare(strict_types=1);

namespace Ichinya\FontAwesome\Traits;


use Ichinya\FontAwesome\Components\FontAwesome;
use MoonShine\Support\Enums\Color;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Throwable;

trait WithAwesomeIcon
{
    protected ?string $icon = null;
    protected ?string $color = 'black';
    protected ?string $class = '';

    public function fontAwesomeIcon(string $icon, ?string $color = null, ?string $class = null): static
    {
        $this->icon = $icon;
        $this->color = $color;
        $this->class = $class;

        return $this;
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws Throwable
     */
    public function getIcon(
        int          $size = 8,
        Color|string $color = '',
        array        $attributes = []
    ): string
    {
        if ($this->getIconValue() === '') {
            return '';
        }

        $icon = FontAwesome::make(
            $this->getIconValue(),
            $this->getCustomColor() ?? $this->color,
            $this->class ?? ''
        );


        return (string)rescue(
            static fn() => $icon->render(),
            rescue: static fn(): string => '',
            report: false
        );
    }

    public function getCustomColor(): Color|string|null
    {
        return null;
    }

}
