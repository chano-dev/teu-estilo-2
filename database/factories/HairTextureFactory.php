<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HairTexture>
 */
class HairTextureFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => fake()->sentence(),
            'curl_pattern' => fake()->randomElement(['1A', '2A', '3A', '3B', '4A', '4C']),
            'characteristics' => fake()->paragraph(),
            'styling_tips' => fake()->paragraph(),
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