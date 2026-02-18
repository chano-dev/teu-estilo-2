<?php

namespace Database\Factories;

use App\Enums\PriceType;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => fake()->paragraphs(2, true),
            'short_description' => fake()->sentence(),
            'subcategory_id' => Subcategory::factory(),
            'segment_id' => null,
            'base_price' => fake()->randomFloat(2, 5000, 30000),
            'price_type' => PriceType::Fixed,
            'requires_measurements' => false,
            'requires_deposit' => false,
            'deposit_percentage' => 0,
            'duration_minutes' => fake()->optional()->numberBetween(30, 240),
            'available_days' => ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'],
            'available_hours' => ['start' => '09:00', 'end' => '18:00'],
            'max_advance_booking_days' => 30,
            'image_path' => null,
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
