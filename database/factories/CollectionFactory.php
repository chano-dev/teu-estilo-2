<?php

namespace Database\Factories;

use App\Enums\Season;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Collection>
 */
class CollectionFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => fake()->sentence(),
            'image_path' => null,
            'year' => fake()->numberBetween(2025, 2027),
            'season' => fake()->randomElement(Season::cases()),
            'starts_at' => fake()->date(),
            'ends_at' => fake()->dateTimeBetween('+1 month', '+6 months')->format('Y-m-d'),
            'is_active' => true,
            'is_featured' => false,
            'sort_order' => fake()->numberBetween(0, 20),
            'meta_title' => null,
            'meta_description' => null,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }
}