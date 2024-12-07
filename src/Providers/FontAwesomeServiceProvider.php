<?php

declare(strict_types=1);

namespace Ichinya\FontAwesome\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

final class FontAwesomeServiceProvider extends ServiceProvider
{


    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'moonshine-fontawesome');

        // fix добавлено заглушкой, потом надо переделать нормально
        moonshineAssets()->add(
            'vendor/moonshine-fontawesome/css/moonshine-fontawesome.css'
        );


        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/moonshine-fontawesome'),
        ], ['moonshine-fontawesome-assets', 'laravel-assets', 'moonshine-assets', 'public']);

    }

    static function htmlStyle(): string
    {
        // fix не знаю как вывести один раз
        return Vite::useBuildDirectory('vendor/moonshine-fontawesome')
            ->withEntryPoints(['resources/css/all.min.css'])
            ->toHtml();

    }
}
