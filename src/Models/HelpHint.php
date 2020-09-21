<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout\Models;

use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HelpHint
 *
 * @package Leshkens\OrchidHelpHintLayout\Models
 */
class HelpHint extends Model
{
    use AsSource;

    /**
     * @var string
     */
    protected $table = 'orchid_help_hints';

    /**
     * @var array
     */
    protected $fillable = [
        'slug',
        'type',
        'is_visible',
        'heading',
        'content'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'is_visible' => 'boolean'
    ];
}
