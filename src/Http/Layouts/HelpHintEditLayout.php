<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout\Http\Layouts;

use Leshkens\OrchidHelpHintLayout\Services\HelpHintService;
use Leshkens\OrchidHelpHintLayout\Support\Style;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Code;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

/**
 * Class HelpHintEditLayout
 *
 * @package Leshkens\OrchidHelpHintLayout\Http\Layouts
 */
class HelpHintEditLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): array
    {
        return [

            Group::make([
                Select::make('hint.slug')
                    ->title(__('Location'))
                    ->required()
                    ->options(HelpHintService::getAvailableSlugs($this->query->getContent('hint')->slug)),

                Select::make('hint.type')
                    ->title(__('Style'))
                    ->required()
                    ->options(Style::widthTitles())
                    ->help(__('Color scheme'))
            ]),

            Group::make([

                TextArea::make('hint.heading')
                    ->title(__('Heading')),

                Switcher::make('hint.is_visible')
                    ->sendTrueOrFalse()
                    ->value(true)
                    ->title(__('Visibility'))
                    ->placeholder(__('Off/on'))
                    ->help(__('If disabled, it will not be displayed'))
            ]),

            Code::make('hint.content')
                ->title(__('Content'))
                ->required()
                ->language('html')
                ->lineNumbers(false)
                ->help(__('Plain text or html. You can use') . ' <a href="https://getbootstrap.com/docs/4.5/getting-started/introduction/" title="Bootstrap">Bootstrap</a>')
        ];
    }
}
