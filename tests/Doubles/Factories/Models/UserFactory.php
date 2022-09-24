<?php

declare(strict_types = 1);

namespace NeueCommerce\ActivityLogger\Tests\Doubles\Factories\Models;

use Illuminate\Database\Eloquent\Factories\Factory;
use NeueCommerce\ActivityLogger\Tests\Doubles\Models\User;

final class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => 'John Doe',
        ];
    }
}
