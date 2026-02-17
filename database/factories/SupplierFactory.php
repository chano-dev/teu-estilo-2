<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    public function definition(): array
    {
        $company = fake()->unique()->company();

        return [
            'name' => fake()->name(),
            'company_name' => $company,
            'slug' => Str::slug($company),
            'tax_id' => null,
            'sku_code' => strtoupper(fake()->unique()->lexify('????')),
            'email' => fake()->optional()->safeEmail(),
            'phone' => fake()->numerify('9########'),
            'whatsapp' => fake()->optional()->numerify('9########'),
            'address' => fake()->optional()->streetAddress(),
            'city' => 'Luanda',
            'province' => 'Luanda',
            'country' => 'Angola',
            'payment_terms' => 'custom',
            'bank_name' => null,
            'bank_account' => null,
            'is_consignment' => true,
            'commission_percentage' => null,
            'rating' => null,
            'is_active' => true,
            'notes' => null,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }

    /**
     * Fornecedor de stock próprio (não consignação).
     */
    public function ownStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_consignment' => false,
        ]);
    }
}