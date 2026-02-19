<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
class CartItemFactory extends Factory
{
    public function definition(): array
    {
        $unitPrice = fake()->randomFloat(2, 5000, 30000);
        $quantity = fake()->numberBetween(1, 3);

        return [
            'cart_id' => Cart::factory(),
            'product_id' => Product::factory(),
            'variation_id' => null,
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
            'discount_percentage' => 0,
            'subtotal' => $unitPrice * $quantity,
            'needs_confirmation' => false,
            'confirmed_at' => null,
            'notes' => null,
        ];
    }
}