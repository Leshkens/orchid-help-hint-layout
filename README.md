# Orchid Help Hints Layout package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/leshkens/orchid-help-hint-layout.svg?style=flat-square)](https://packagist.org/packages/leshkens/orchid-help-hint-layout)
[![Total Downloads](https://img.shields.io/packagist/dt/leshkens/orchid-help-hint-layout.svg?style=flat-square)](https://packagist.org/packages/leshkens/orchid-help-hint-layout)

![screenshot](https://user-images.githubusercontent.com/8939383/140321513-0abe9fe6-6b36-4da0-af61-a7ab4ca1c24d.png)

## Installation

**Install via composer**: `composer require leshkens/orchid-help-hint-layout`

_For old orchid versions:_

| Orchid version                     | Composer command                                  |
|-------------------------------------|---------------------------------------------------|
| Orchid 9.x | `composer require leshkens/orchid-help-hint-layout:^2.0` |
| Orchid 8.x | `composer require leshkens/orchid-help-hint-layout:^1.0` |


Install package migration:
```bash
php artisan migrate
```

Publish config file:

```bash
php artisan vendor:publish --provider="Leshkens\OrchidHelpHintLayout\Providers\ServiceProvider"
```

## Usage

It easy. Add to you screen:

```php
public function layout(): array
{
    return [
        HelpHintLayout::make('foobar')
    ];
}
```

Then add it to the hint map (in `config/platform-hints.php`):

```php
'hints_map' => [
    'foobar' => 'My hint is somewhere'
],
```

Grant the user rights to hints and add an entry to the database in `http://yousite.loc/dashboard/systems/help-hints/create`


## Credits

- [All contributors](https://github.com/leshkens/orchid-help-hint-layout/graphs/contributors)

