<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductSupplier>
 */
class ProductSupplierFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'supplier_id' => Supplier::factory(),
            'cost_price' => fake()->randomFloat(2, 2000, 30000),
            'commission_percentage' => fake()->randomFloat(2, 10, 30),
            'is_preferred' => false,
            'lead_time_days' => fake()->numberBetween(1, 14),
            'min_order_quantity' => fake()->numberBetween(1, 10),
            'is_active' => true,
            'notes' => null,
        ];
    }

    public function preferred(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_preferred' => true,
        ]);
    }
}