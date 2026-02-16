<?php

namespace Database\Factories;

use App\Models\Segment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SegmentFactory extends Factory
{
    protected $model = Segment::class;

    /**
     * Gera dados FALSOS aleatórios para testes.
     * Cada vez que chamas Segment::factory()->create()
     * ele cria um segmento com nome e slug aleatórios.
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word();

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => $this->faker->sentence(),
            'icon' => null,
            'image_path' => null,
            'is_active' => true,
            'sort_order' => $this->faker->numberBetween(0, 10),
            'meta_title' => null,
            'meta_description' => null,
        ];
    }

    /**
     * Estado: criar segmento inactivo.
     * Uso: Segment::factory()->inactive()->create()
     */
    public function inactive(): static
    {
        return $this->state(['is_active' => false]);
    }
}
