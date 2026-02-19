<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wishlist>
 */
class WishlistFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'product_id' => Product::factory(),
            'variation_id' => null,
            'notify_on_sale' => false,
            'notify_on_restock' => false,
            'notes' => null,
        ];
    }
}