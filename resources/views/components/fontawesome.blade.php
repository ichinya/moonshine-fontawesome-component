@props([
    'color' => null,
    'include' => null,
])
<span {{ $attributes->merge(['class' => ($class ?? '')]) }} style="color: {{ $color }}"><i class="{{ $slot }}"></i></span>
