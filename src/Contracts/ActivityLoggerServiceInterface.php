<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Contracts;

use NeueCommerce\ActivityLogger\Enums\ActivityLoggerType;

interface ActivityLoggerServiceInterface
{
    public function on(LoggerSubjectInterface | null $subject): self;

    public function by(LoggerCauserInterface | null $causer): self;

    public function properties(array $properties): self;

    public function created(string $title, string $description = ''): ActivityLoggerInterface;

    public function updated(string $title, string $description = ''): ActivityLoggerInterface;

    public function deleted(string $title, string $description = ''): ActivityLoggerInterface;

    public function restored(string $title, string $description = ''): ActivityLoggerInterface;

    public function viewed(string $title, string $description = ''): ActivityLoggerInterface;

    public function log(ActivityLoggerType $type, string $title, string $description): ActivityLoggerInterface;
}
