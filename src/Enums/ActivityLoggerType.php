<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Enums;

enum ActivityLoggerType: string
{
    case CREATED = 'created';

    case UPDATED = 'updated';

    case DELETED = 'deleted';

    case RESTORED = 'restored';

    case VIEWED = 'viewed';
}
