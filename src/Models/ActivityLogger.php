<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use NeueCommerce\ActivityLogger\Contracts\ActivityLoggerInterface;
use NeueCommerce\ModelCasts\CollectionCast;

class ActivityLogger extends Model implements ActivityLoggerInterface
{
    protected $guarded = ['*'];

    protected $casts = [
        'properties' => CollectionCast::class,
    ];

    protected $attributes = [
        'properties' => '[]',
    ];

    public function getTable()
    {
        return config('neuecommerce.activity-logger.model.table_name');
    }

    public function subject(): MorphTo
    {
        return $this->morphTo();
    }

    public function causer(): MorphTo | null
    {
        return $this->morphTo();
    }
}
