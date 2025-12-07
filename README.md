# MoonShine FontAwesomeIcon Component for [MoonShine Laravel admin panel](https://moonshine-laravel.com)

![PHP](https://img.shields.io/badge/PHP-^8.2-blue.svg?style=flat)

### Requirements

- MoonShine v3.0+

| MoonShine | FontAwesomeIcon | Comment     |
|-----------|-----------------|-------------|
| 2.0+      | 1.0             |             |
| 3.0+      | 1.1+            | Color::Blue |
| 4.0+      | 1.3+            | Color::BLUE |


## Installation

```bash
composer require ichinya/moonshine-fontawesome-component
```

## Usage

Example of usage:

* `FontAwesome::make('<i class="fa-brands fa-telegram"></i>' , 'blue')`
* `FontAwesome::make('fa-brands fa-telegram' , \MoonShine\Support\Enums\Color::BLUE)`

For out:

```php
    echo FontAwesome::make('fa-brands fa-telegram')->toString();
    echo FontAwesome::make('fa-brands fa-telegram' , \MoonShine\Support\Enums\Color::BLUE)->render();
    echo (string) FontAwesome::make('fa-brands fa-telegram' , \MoonShine\Support\Enums\Color::BLUE);
```

You can use `FontAwesome` component in your resources:

```php
class CustomResource extends ModelResource
{
    public function fields(): array
    {
        return [
             Select::make('Тип', 'type')->options([
//                    TelegramBot::class => FontAwesome::make('<i class="fa-brands fa-telegram"></i>' , 'blue'),
                    TelegramBot::class =>  Badge::make(FontAwesome::make('<i class="fa-brands fa-telegram"></i>' , 'blue') . 'Telegram', 'blue'),

                ]),
        ];
    }
}
```

Use in Menu:

```php
use Ichinya\FontAwesome\Components\MenuItem;

protected function menu(): array
    {
        return [
            MenuItem::make('Файлы', FileResource::class)->fontAwesomeIcon('<i class="fa-solid fa-upload"></i>'),
        ];
    }
```

## Plans

* [ ] Macros to Fields.
* [ ] fa-brands fa-telegram => telegram
* [ ] Add more customization options for the FontAwesome Component.

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.
