<?php

namespace Database\Factories;

use App\Enums\ProductCondition;
use App\Models\Brand;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);
        $priceSell = fake()->randomFloat(2, 2000, 50000);

        return [
            'sku' => strtoupper(fake()->unique()->bothify('???##-????-####')),
            'barcode' => null,
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => fake()->paragraphs(2, true),
            'short_description' => fake()->sentence(),
            'subcategory_id' => Subcategory::factory(),
            'brand_id' => Brand::factory(),
            'collection_id' => null,
            'price_cost' => round($priceSell * 0.6, 2),
            'price_sell' => $priceSell,
            'discount_percentage' => 0,
            'stock_min' => fake()->numberBetween(2, 10),
            'weight' => fake()->optional()->numberBetween(100, 2000),
            'condition' => ProductCondition::New,
            'is_active' => true,
            'is_featured' => fake()->boolean(20),
            'is_new' => true,
            'is_trending' => false,
            'is_bestseller' => false,
            'is_on_sale' => false,
            'published_at' => now(),
            'publish_start' => null,
            'publish_end' => null,
            'meta_title' => null,
            'meta_description' => null,
            'views_count' => 0,
            'sales_count' => 0,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    public function onSale(float $discount = 20): static
    {
        return $this->state(fn (array $attributes) => [
            'discount_percentage' => $discount,
            'is_on_sale' => true,
        ]);
    }

    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }
}
