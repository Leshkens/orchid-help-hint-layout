<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout\Support;

use MyCLabs\Enum\Enum;

/**
 * Class Color
 *
 * @package Leshkens\OrchidHelpHintLayout\Support
 */
class Color
{
    /**
     * @var string[]
     */
    protected $types = [
        'info',
        'success',
        'warning',
        'danger',
        'light',
        'dark'
    ];

    /**
     * @return array
     */
    public static function widthTitles(): array
    {
        return array_combine((new static)->types, [
            __('Blue'),
            __('Green'),
            __('Yellow'),
            __('Red'),
            __('White'),
            __('Dark grey')
        ]);
    }

    /**
     * @return string[]
     */
    public static function getTypes(): array
    {
        return (new static)->types;
    }

    /**
     * @param string $type
     *
     * @return string
     */
    public static function getTitle(string $type): string
    {
        return (new static)->widthTitles()[$type];
    }
}
