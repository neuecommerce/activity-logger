<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Tests\Doubles\Models;

use Illuminate\Database\Eloquent\Model;
use NeueCommerce\ActivityLogger\Contracts\LoggerSubjectInterface;
use NeueCommerce\ActivityLogger\Models\HasActivityLog;

final class Product extends Model implements LoggerSubjectInterface
{
    use HasActivityLog;

    protected $table = 'products';
}
