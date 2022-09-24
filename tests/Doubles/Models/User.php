<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Tests\Doubles\Models;

use Illuminate\Database\Eloquent\Model;
use NeueCommerce\ActivityLogger\Contracts\LoggerCauserInterface;
use NeueCommerce\ActivityLogger\Models\HasActivityLog;

final class User extends Model implements LoggerCauserInterface
{
    use HasActivityLog;

    protected $table = 'users';
}
