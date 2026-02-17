<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Segment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subcategory>
 */
class SubcategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->word();

        return [
            'category_id' => Category::factory(),
            'segment_id' => Segment::factory(),
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => fake()->sentence(),
            'image_path' => null,
            'sku_code' => strtoupper(fake()->unique()->lexify('?????')),
            'is_active' => true,
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
}