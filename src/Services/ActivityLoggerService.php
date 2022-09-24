<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Services;

use NeueCommerce\ActivityLogger\Contracts\ActivityLoggerInterface;
use NeueCommerce\ActivityLogger\Contracts\ActivityLoggerServiceInterface;
use NeueCommerce\ActivityLogger\Contracts\LoggerCauserInterface;
use NeueCommerce\ActivityLogger\Contracts\LoggerSubjectInterface;

class ActivityLoggerService implements ActivityLoggerServiceInterface
{
    private LoggerSubjectInterface | null $subject = null;

    private LoggerCauserInterface | null $causer = null;

    private array $properties = [];

    public function __construct(
        private readonly ActivityLoggerInterface $model,
    ) {
    }

    public function on(LoggerSubjectInterface | null $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function by(LoggerCauserInterface | null $causer): self
    {
        $this->causer = $causer;

        return $this;
    }

    public function properties(array $properties): self
    {
        $this->properties = $properties;

        return $this;
    }

    public function created(string $title, string | null $description = null): ActivityLoggerInterface
    {
        return $this->log('created', $title, $description);
    }

    public function updated(string $title, string | null $description = null): ActivityLoggerInterface
    {
        $this->properties = array_merge($this->properties, [
            'original' => $this->subject->getOriginal(),
            'changed'  => $this->subject->getChanges(),
        ]);

        return $this->log('updated', $title, $description);
    }

    public function deleted(string $title, string | null $description = null): ActivityLoggerInterface
    {
        return $this->log('deleted', $title, $description);
    }

    public function restored(string $title, string | null $description = null): ActivityLoggerInterface
    {
        return $this->log('restored', $title, $description);
    }

    public function log(string $type, string $title, string | null $description = null): ActivityLoggerInterface
    {
        /** @var ActivityLoggerInterface $activity */
        $activity = new $this->model();

        $activity->subject()->associate($this->subject);
        $activity->causer()->associate($this->causer);

        $activity->type = $type;
        $activity->title = $title;
        $activity->description = $description;
        $activity->properties = $this->properties;

        $activity->save();

        return $activity;
    }
}
