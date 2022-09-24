<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Contracts;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Collection;

/**
 * @method bool save(array $options = [])
 * @method Builder query()
 *
 * @property int $id
 * @property string $type
 * @property string $title
 * @property string|null $description
 * @property string $subject_type
 * @property int $subject_id
 * @property string|null $causer_type
 * @property int|null $causer_id
 * @property Collection $properties
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 * @property LoggerSubjectInterface $subject
 * @property LoggerCauserInterface|null $causer
 */
interface ActivityLoggerInterface
{
    public function subject(): MorphTo;

    public function causer(): MorphTo | null;
}
