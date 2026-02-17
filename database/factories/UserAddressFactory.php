<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAddress>
 */
class UserAddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'label' => fake()->randomElement(['Casa', 'Trabalho', 'Outro']),
            'recipient_name' => fake()->name(),
            'recipient_phone' => fake()->numerify('9########'),
            'street' => fake()->streetName(),
            'number' => fake()->optional()->buildingNumber(),
            'complement' => fake()->optional()->secondaryAddress(),
            'neighborhood' => fake()->citySuffix() . ' ' . fake()->word(),
            'city' => 'Luanda',
            'province' => 'Luanda',
            'postal_code' => null,
            'country' => 'Angola',
            'landmark' => fake()->optional()->sentence(3),
            'is_default' => false,
            'is_active' => true,
        ];
    }

    /**
     * Marcar como endereço padrão.
     */
    public function default(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_default' => true,
        ]);
    }
}