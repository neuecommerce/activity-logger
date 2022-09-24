<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger;

use Illuminate\Contracts\Foundation\Application;
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
            realpath(__DIR__.'/../config/activity-logger.php'), 'neue-commerce.activity-logger'
        );
    }

    private function registerServices(): void
    {
        $this->app->bind(ActivityLoggerInterface::class, function (Application $app) {
            return $app->make(ActivityLogger::class);
        });

        $this->app->singleton(ActivityLoggerServiceInterface::class, function (Application $app) {
            return $app->make(ActivityLoggerService::class);
        });
    }

    private function registerResources(): void
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(
                realpath(__DIR__.'/../database/migrations')
            );
        }
    }

    private function offerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                realpath(__DIR__.'/../database/migrations') => $this->app->databasePath('migrations'),
            ], ['neue-commerce', 'activity-logger', 'migrations']);

            $this->publishes([
                realpath(__DIR__.'/../config/activity-logger.php') => $this->app->configPath('neue-commerce/activity-logger.php'),
            ], ['neue-commerce', 'activity-logger', 'config']);
        }
    }
}
