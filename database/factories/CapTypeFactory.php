<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CapType>
 */
class CapTypeFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => fake()->sentence(),
            'characteristics' => fake()->paragraph(),
            'naturalness_level' => fake()->randomElement(['low', 'medium', 'high', 'very_high']),
            'ease_of_use' => fake()->randomElement(['easy', 'moderate', 'advanced']),
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