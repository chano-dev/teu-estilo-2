<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HairDensity>
 */
class HairDensityFactory extends Factory
{
    public function definition(): array
    {
        $percentage = fake()->randomElement([100, 130, 150, 180, 200, 250]);

        return [
            'name' => $percentage . '%',
            'slug' => 'densidade-' . $percentage,
            'percentage' => $percentage,
            'description' => fake()->sentence(),
            'volume_level' => fake()->randomElement(['light', 'natural', 'medium', 'full', 'very_full']),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(0, 10),
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}