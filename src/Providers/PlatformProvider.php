<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout\Providers;

use Orchid\Platform\Menu;
use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemMenu;
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
    public function registerSystemMenu(): array
    {
        return [
            ItemMenu::label(__('Help hints'))
                ->icon('support')
                ->slug('HelpHints')
                ->active('platform.systems.*')
                ->permission('platform.systems.index')
                ->sort(9000),

            ItemMenu::label(__('Hints'))
                ->place('HelpHints')
                ->icon('list')
                ->route('platform.systems.help-hints')
                ->permission('platform.systems.help-hints')
                ->sort(9000)
                ->title(__('Hints list')),
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
