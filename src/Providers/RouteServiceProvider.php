<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout\Providers;

use Orchid\Support\Facades\Dashboard;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends \Illuminate\Foundation\Support\Providers\RouteServiceProvider
{
    /**
     * @return void
     */
    public function map(): void
    {
        Route::domain((string) config('platform.domain'))
            ->prefix(Dashboard::prefix('/help-hints'))
            ->as('platform.')
            ->middleware(config('platform.middleware.private'))
            ->group(realpath(ServiceProvider::PACKAGE_PATH . '/routes/platform.php'));
    }
}
