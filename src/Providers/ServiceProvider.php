<?php

declare(strict_types=1);

namespace Leshkens\OrchidHelpHintLayout\Providers;

use Leshkens\OrchidHelpHintLayout\Services\ModelService;
use Orchid\Platform\Dashboard;

/**
 * Class ServiceProvider
 *
 * @package Leshkens\OrchidHelpHintLayout\Providers
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * @const string
     */
    const PACKAGE_NAME = 'orchid-help-hint-layout';

    /**
     * @const string
     */
    const PACKAGE_PATH = __DIR__ . '/../../';

    /**
     * @const string
     */
    const CONFIG_PATH = __DIR__ . '/../../config/platform-hints.php';

    /**
     * @var Dashboard
     */
    protected $dashboard;

    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;

        $this->loadViewsFrom(self::PACKAGE_PATH . 'resources/views',
            self::PACKAGE_NAME);

        $this->loadMigrationsFrom(self::PACKAGE_PATH . 'database/migrations');

        $this->publishes([
            self::CONFIG_PATH => config_path('platform-hints.php')
        ], 'config');
    }

    /**
     *
     */
    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'platform-hints'
        );

        $this->loadJsonTranslationsFrom(self::PACKAGE_PATH . 'resources/lang');

        $this->app->singleton(ModelService::class, function () {
            return new ModelService(config('platform-hints.model'));
        });

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(PlatformProvider::class);
    }

}
