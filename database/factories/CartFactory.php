<?php

namespace Database\Factories;

use App\Enums\CartStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => null,
            'session_id' => Str::random(40),
            'cart_token' => Str::random(64),
            'guest_name' => fake()->name(),
            'guest_email' => fake()->email(),
            'guest_phone' => fake()->phoneNumber(),
            'user_address_id' => null,
            'subtotal' => 0,
            'discount_amount' => 0,
            'delivery_fee' => 0,
            'total' => 0,
            'status' => CartStatus::Active,
            'customer_notes' => null,
            'internal_notes' => null,
            'expires_at' => now()->addDays(7),
        ];
    }
}