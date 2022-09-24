<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use NeueCommerce\ActivityLogger\Contracts\ActivityLoggerInterface;
use NeueCommerce\ActivityLogger\Enums\ActivityLoggerType;
use NeueCommerce\ModelCasts\CollectionCast;

class ActivityLogger extends Model implements ActivityLoggerInterface
{
    protected $guarded = ['*'];

    protected $attributes = [
        'properties' => '[]',
    ];

    protected $casts = [
        'type'       => ActivityLoggerType::class,
        'properties' => CollectionCast::class,
    ];

    public function getTable()
    {
        return config('neue-commerce.activity-logger.model.table_name');
    }

    public function subject(): MorphTo | null
    {
        return $this->morphTo();
    }

    public function causer(): MorphTo | null
    {
        return $this->morphTo();
    }
}
