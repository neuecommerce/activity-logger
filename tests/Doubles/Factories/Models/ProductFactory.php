<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Tests\Doubles\Factories\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use NeueCommerce\ActivityLogger\Tests\Doubles\Models\Product;

final class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => 'T-Shirt (what else)',
        ];
    }
}
