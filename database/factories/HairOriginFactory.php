<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HairOrigin>
 */
class HairOriginFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->country();

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'country_code' => fake()->countryCode(),
            'description' => fake()->sentence(),
            'characteristics' => fake()->paragraph(),
            'texture_profile' => fake()->randomElement(['straight', 'wavy', 'curly', 'varied']),
            'quality_tier' => fake()->randomElement(['standard', 'premium', 'luxury']),
            'price_range' => fake()->randomElement(['low', 'medium', 'high', 'premium']),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(0, 15),
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}