<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Size>
 */
class SizeFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->randomElement(['XS', 'S', 'M', 'L', 'XL', 'XXL']);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'size_type' => 'clothing',
            'description' => fake()->optional()->sentence(),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(0, 50),
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}