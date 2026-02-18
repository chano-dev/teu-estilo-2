<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductService>
 */
class ProductServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'service_id' => Service::factory(),
            'is_included' => false,
            'additional_price' => fake()->randomFloat(2, 3000, 10000),
            'discount_percentage' => 0,
            'is_required' => false,
            'is_recommended' => true,
            'sort_order' => 0,
            'is_active' => true,
        ];
    }
}