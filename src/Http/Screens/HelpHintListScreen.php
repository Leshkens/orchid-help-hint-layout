<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout\Http\Screens;

use Leshkens\OrchidHelpHintLayout\Http\Layouts\HelpHintListLayout;
use Leshkens\OrchidHelpHintLayout\Services\HelpHintService;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

/**
 * Class HelpHintListScreen
 *
 * @package Leshkens\OrchidHelpHintLayout\Http\Screens
 */
class HelpHintListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Hints';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Hints list';

    /**
     * Permission.
     *
     * @var string
     */
    public $permission = 'platform.systems.help-hints';

    /**
     * @param HelpHintService $service
     *
     * @return array
     */
    public function query(HelpHintService $service)
    {

        return [
            'hints' => $service->model->paginate(config('platform-hints.per_page'))
        ];
    }

    /**
     * @return array
     */
    public function commandBar(): array
    {
        return [
            Link::make(__('Create hint'))
                ->icon('plus')
                ->canSee(count(HelpHintService::getAvailableSlugs()) > 0)
                ->route('platform.systems.help-hints.create')
        ];
    }

    /**
     * @return array
     */
    public function layout(): array
    {
        return [
            HelpHintListLayout::class
        ];
    }
}
