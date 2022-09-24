<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger;

use Illuminate\Support\ServiceProvider;
use NeueCommerce\ActivityLogger\Contracts\ActivityLoggerInterface;
use NeueCommerce\ActivityLogger\Contracts\ActivityLoggerServiceInterface;
use NeueCommerce\ActivityLogger\Models\ActivityLogger;
use NeueCommerce\ActivityLogger\Services\ActivityLoggerService;

class ActivityLoggerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerResources();

        $this->offerPublishing();
    }

    public function register()
    {
        $this->configure();

        $this->registerServices();
    }

    private function configure(): void
    {
        $this->mergeConfigFrom(
            path: __DIR__.'/../config/activity-logger.php',
            key: 'neuecommerce.activity-logger',
        );
    }

    private function registerServices(): void
    {
        $this->app->bind(ActivityLoggerInterface::class, ActivityLogger::class);

        $this->app->singleton(ActivityLoggerServiceInterface::class, ActivityLoggerService::class);
    }

    private function registerResources(): void
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(
                paths: __DIR__.'/../database/migrations'
            );
        }
    }

    private function offerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../database/migrations' => $this->app->databasePath('migrations'),
            ], ['neuecommerce', 'activity-logger', 'migrations', 'neuecommerce-activity-logger-migrations']);

            $this->publishes([
                __DIR__.'/../config/activity-logger.php' => $this->app->configPath('neuecommerce/activity-logger.php'),
            ], ['neuecommerce', 'activity-logger', 'config', 'neuecommerce-activity-logger-config']);
        }
    }
}
