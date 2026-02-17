<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HairType>
 */
class HairTypeFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => fake()->sentence(),
            'characteristics' => fake()->paragraph(),
            'durability' => fake()->randomElement(['6-12 meses', '1-2 anos', '2-3 anos']),
            'price_range' => fake()->randomElement(['low', 'medium', 'high', 'premium']),
            'can_be_dyed' => fake()->boolean(),
            'can_be_heat_styled' => fake()->boolean(),
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