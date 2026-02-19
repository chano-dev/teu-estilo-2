<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExchangeRate>
 */
class ExchangeRateFactory extends Factory
{
    public function definition(): array
    {
        return [
            'currency_from' => 'USD',
            'currency_to' => 'AOA',
            'rate' => fake()->randomFloat(4, 800, 1000),
            'margin_percentage' => fake()->randomFloat(2, 5, 15),
            'is_active' => true,
            'effective_from' => now(),
        ];
    }
}