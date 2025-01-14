# MoonShine FontAwesomeIcon Component for [MoonShine Laravel admin panel](https://moonshine-laravel.com)

![PHP](https://img.shields.io/badge/PHP-^8.2-blue.svg?style=flat)

### Requirements

- MoonShine v3.0+

| MoonShine | FontAwesomeIcon |
|-----------|-----------------|
| 2.0+      | 1.0             |
| 3.0+      | 1.1+            |

## Installation

```bash
composer require ichinya/moonshine-fontawesome-component
```

## Usage

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

* Macros to Fields.
* fa-brands fa-telegram => telegram
* Add more customization options for the FontAwesome Component.

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.
