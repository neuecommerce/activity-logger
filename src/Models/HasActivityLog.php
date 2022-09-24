<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasActivityLog
{
    public function activityLogs(): MorphMany
    {
        return $this->morphMany(ActivityLogger::class, 'subject');
    }
}
