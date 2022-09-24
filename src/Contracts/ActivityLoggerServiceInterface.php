<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Contracts;

interface ActivityLoggerServiceInterface
{
    public function on(LoggerSubjectInterface | null $subject): self;

    public function by(LoggerCauserInterface | null $causer): self;

    public function properties(array $properties): self;

    public function created(string $title, string | null $description = null): ActivityLoggerInterface;

    public function updated(string $title, string | null $description = null): ActivityLoggerInterface;

    public function deleted(string $title, string | null $description = null): ActivityLoggerInterface;

    public function restored(string $title, string | null $description = null): ActivityLoggerInterface;

    public function log(string $type, string $title, string | null $description = null): ActivityLoggerInterface;
}
