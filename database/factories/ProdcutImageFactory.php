<?php

namespace Database\Factories;

use App\Enums\ImageType;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'variation_id' => null,
            'file_path' => 'products/' . fake()->uuid() . '.jpg',
            'file_name' => fake()->word() . '.jpg',
            'image_type' => ImageType::Main,
            'is_primary' => false,
            'sort_order' => 0,
            'alt_text' => fake()->sentence(4),
        ];
    }

    public function primary(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_primary' => true,
        ]);
    }
}