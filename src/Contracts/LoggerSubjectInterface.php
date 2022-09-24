<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface LoggerSubjectInterface
{
    public function getOriginal($key = null, $default = null);

    public function getChanges();

    public function activityLogs(): MorphMany;
}
