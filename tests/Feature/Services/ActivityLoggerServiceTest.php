<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Tests\Feature\Services;

use NeueCommerce\ActivityLogger\Contracts\ActivityLoggerInterface;
use NeueCommerce\ActivityLogger\Contracts\ActivityLoggerServiceInterface;
use NeueCommerce\ActivityLogger\Services\ActivityLoggerService;
use NeueCommerce\ActivityLogger\Tests\Doubles\Factories\Models\ProductFactory;
use NeueCommerce\ActivityLogger\Tests\Doubles\Factories\Models\UserFactory;
use NeueCommerce\ActivityLogger\Tests\Doubles\Models\Product;
use NeueCommerce\ActivityLogger\Tests\Doubles\Models\User;
use NeueCommerce\ActivityLogger\Tests\TestCase;

final class ActivityLoggerServiceTest extends TestCase
{
    /**
     * @test
     */
    public function can_create_a_log_without_a_causer()
    {
        /** @var ActivityLoggerServiceInterface $logger */
        $logger = $this->app->make(ActivityLoggerService::class);

        /** @var Product $product */
        $product = ProductFactory::new()->create();

        $logger->on($product)->created('Created', 'Product was created');

        $logs = $product->activityLogs()->get();

        /** @var ActivityLoggerInterface $log */
        $log = $logs[0];

        expect($logs)->toHaveCount(1);
        expect($log->title)->toBe('Created');
        expect($log->description)->toBe('Product was created');
        expect($log->causer)->toBeNull();
        expect($log->properties)->toBeEmpty();
    }

    /**
     * @test
     */
    public function can_create_a_log_with_a_causer()
    {
        /** @var ActivityLoggerServiceInterface $logger */
        $logger = $this->app->make(ActivityLoggerService::class);

        /** @var User $causer */
        $causer = UserFactory::new()->create();

        /** @var Product $product */
        $product = ProductFactory::new()->create();

        $logger->on($product)->by($causer)->created('Created', 'Product was created');

        $logs = $product->activityLogs()->get();

        /** @var ActivityLoggerInterface $log */
        $log = $logs[0];

        expect($logs)->toHaveCount(1);
        expect($log->title)->toBe('Created');
        expect($log->description)->toBe('Product was created');
        expect($log->causer)->not->toBeNull();
        expect($log->properties)->toBeEmpty();
    }

    /**
     * @test
     */
    public function can_create_a_log_without_properties()
    {
        /** @var ActivityLoggerServiceInterface $logger */
        $logger = $this->app->make(ActivityLoggerService::class);

        /** @var Product $product */
        $product = ProductFactory::new()->create();

        $logger->on($product)->created('Created', 'Product was created');

        $logs = $product->activityLogs()->get();

        /** @var ActivityLoggerInterface $log */
        $log = $logs[0];

        expect($logs)->toHaveCount(1);
        expect($log->title)->toBe('Created');
        expect($log->description)->toBe('Product was created');
        expect($log->causer)->toBeNull();
        expect($log->properties)->toBeEmpty();
    }

    /**
     * @test
     */
    public function can_create_a_log_with_properties()
    {
        /** @var ActivityLoggerServiceInterface $logger */
        $logger = $this->app->make(ActivityLoggerService::class);

        /** @var Product $product */
        $product = ProductFactory::new()->create();

        $logger->on($product)->properties([
            'a-key' => 'A Value',
        ])->created('Created', 'Product was created');

        $logs = $product->activityLogs()->get();

        /** @var ActivityLoggerInterface $log */
        $log = $logs[0];

        expect($logs)->toHaveCount(1);
        expect($log->title)->toBe('Created');
        expect($log->description)->toBe('Product was created');
        expect($log->causer)->toBeNull();
        expect($log->properties)->not->toBeEmpty();
    }

    /**
     * @test
     */
    public function can_log_a_default_created_event()
    {
        /** @var ActivityLoggerServiceInterface $logger */
        $logger = $this->app->make(ActivityLoggerService::class);

        /** @var Product $product */
        $product = ProductFactory::new()->create();

        $logger->on($product)->created('Created', 'Product was created');

        $logs = $product->activityLogs()->get();

        /** @var ActivityLoggerInterface $log */
        $log = $logs[0];

        expect($logs)->toHaveCount(1);
        expect($log->title)->toBe('Created');
        expect($log->description)->toBe('Product was created');
        expect($log->causer)->toBeNull();
        expect($log->properties)->toBeEmpty();
    }

    /**
     * @test
     */
    public function can_log_a_default_updated_event()
    {
        /** @var ActivityLoggerServiceInterface $logger */
        $logger = $this->app->make(ActivityLoggerService::class);

        /** @var Product $product */
        $product = ProductFactory::new()->create();

        $logger->on($product)->updated('Updated', 'Product was updated');

        $logs = $product->activityLogs()->get();

        /** @var ActivityLoggerInterface $log */
        $log = $logs[0];

        expect($logs)->toHaveCount(1);
        expect($log->title)->toBe('Updated');
        expect($log->description)->toBe('Product was updated');
        expect($log->causer)->toBeNull();
        expect($log->properties)->not->toBeEmpty();
    }

    /**
     * @test
     */
    public function can_log_a_default_deleted_event()
    {
        /** @var ActivityLoggerServiceInterface $logger */
        $logger = $this->app->make(ActivityLoggerService::class);

        /** @var Product $product */
        $product = ProductFactory::new()->create();

        $logger->on($product)->deleted('Deleted', 'Product was deleted');

        $logs = $product->activityLogs()->get();

        /** @var ActivityLoggerInterface $log */
        $log = $logs[0];

        expect($logs)->toHaveCount(1);
        expect($log->title)->toBe('Deleted');
        expect($log->description)->toBe('Product was deleted');
        expect($log->causer)->toBeNull();
        expect($log->properties)->toBeEmpty();
    }

    /**
     * @test
     */
    public function can_log_a_default_restored_event()
    {
        /** @var ActivityLoggerServiceInterface $logger */
        $logger = $this->app->make(ActivityLoggerService::class);

        /** @var Product $product */
        $product = ProductFactory::new()->create();

        $logger->on($product)->restored('Restored', 'Product was restored');

        $logs = $product->activityLogs()->get();

        /** @var ActivityLoggerInterface $log */
        $log = $logs[0];

        expect($logs)->toHaveCount(1);
        expect($log->title)->toBe('Restored');
        expect($log->description)->toBe('Product was restored');
        expect($log->causer)->toBeNull();
        expect($log->properties)->toBeEmpty();
    }
}
