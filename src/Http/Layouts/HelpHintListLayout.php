<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout\Http\Layouts;

use Illuminate\Database\Eloquent\Model;
use Leshkens\OrchidHelpHintLayout\Support\Color;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;

/**
 * Class HelpHintListLayout
 *
 * @package Leshkens\OrchidHelpHintLayout\Http\Layouts
 */
class HelpHintListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'hints';

    /**
     * @return string
     */
    protected function textNotFound(): string
    {
        return __('No hints were created');
    }

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::set('id', __('Location'))
                ->render(function (Model $model) {

                    $config = config('platform-hints.hints_map');

                    if (isset($config[$model->slug])) {
                        return __($config[$model->slug]);
                    }
                }),

            TD::set('is_visible', __('Visibility'))
                ->align('center')
                ->render(function (Model $model) {
                    if ($model->is_visible) {
                        return __('Yes');
                    }
                    return  __('No');
                }),

            TD::set('type', __('Color scheme'))
                ->align('center')
                ->render(function (Model $model) {
                    return view('orchid-help-hint-layout::partials.badge', [
                        'type' => $model->type,
                        'color' => Color::getTitle($model->type)
                    ]);
                }),

            TD::set('id', '')
                ->align('right')
                ->cantHide()
                ->render(function (Model $model) {
                    return DropDown::make()
                            ->icon('options-vertical')
                            ->list([
                                Link::make(__('Edit'))
                                    ->icon('settings')
                                    ->route('platform.systems.help-hints.edit', $model->id)
                            ]);
                })
        ];
    }
}
