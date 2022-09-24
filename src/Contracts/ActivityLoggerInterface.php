<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphTo;

interface ActivityLoggerInterface
{
    public function subject(): MorphTo | null;

    public function causer(): MorphTo | null;
}
