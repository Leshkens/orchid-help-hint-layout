# Orchid Help Hints Layout

![screenshot](https://user-images.githubusercontent.com/8939383/93819753-93d7fb80-fc75-11ea-9a14-d6af37393527.png)

## Installation

Install via composer:

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

