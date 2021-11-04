<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout\Providers;

use Orchid\Platform\Dashboard;
use Orchid\Screen\Actions\Menu;
use Orchid\Platform\ItemPermission;
use Illuminate\Support\Facades\View;

/**
 * Class PlatformProvider
 *
 * @package Leshkens\OrchidHelpHintLayout\Providers
 */
class PlatformProvider extends \Orchid\Platform\OrchidServiceProvider
{
    /**
     * @return ItemMenu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make(__('Hints list'))
                ->icon('list')
                ->route('platform.systems.help-hints')
                ->permission('platform.systems.help-hints')
                ->title(__('Help hints'))
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('Systems'))
                ->addPermission('platform.systems.help-hints', __('Help hints'))
        ];
    }
}
