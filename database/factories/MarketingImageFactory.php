<?php

namespace Database\Factories;

use App\Enums\MarketingImageType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MarketingImage>
 */
class MarketingImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'file_path' => 'marketing/' . fake()->uuid() . '.jpg',
            'image_type' => MarketingImageType::Banner,
            'segment_id' => null,
            'category_id' => null,
            'page' => 'home',
            'title' => fake()->sentence(4),
            'subtitle' => fake()->optional()->sentence(6),
            'cta_text' => fake()->randomElement(['Ver Mais', 'Comprar Agora', 'Descobrir']),
            'cta_link' => '/',
            'start_date' => null,
            'end_date' => null,
            'is_active' => true,
            'sort_order' => 0,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}