<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface LoggerCauserInterface
{
    public function activityLogs(): MorphMany;
}
