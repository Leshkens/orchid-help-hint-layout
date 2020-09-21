# Orchid Help Hints Layout

![screenshot](https://user-images.githubusercontent.com/8939383/93819753-93d7fb80-fc75-11ea-9a14-d6af37393527.png)

**Requires**: Orchid Platform ^8.0

## Installation

Install via composer:
```bash
composer require leshkens/orchid-help-hint-layout
```

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

    public function layout(): array
    {
        return [
            HelpHintLayout::make('foobar')
        ];
    }

Then add it to the hint map (in config/platform-hints.php):

    'hints_map' => [
        'foobar' => 'My hint is somewhere'
    ],


And add an entry to the database in `http://yousite.loc/dashboard/systems/help-hints/create`



## Credits

- [All contributors](https://github.com/leshkens/orchid-help-hint-layout/graphs/contributors)

