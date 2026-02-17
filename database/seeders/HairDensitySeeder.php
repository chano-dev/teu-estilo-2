<?php

namespace Database\Seeders;

use App\Models\HairDensity;
use Illuminate\Database\Seeder;

class HairDensitySeeder extends Seeder
{
    public function run(): void
    {
        $densities = [
            ['name' => '100% (Leve)', 'slug' => 'densidade-100', 'percentage' => 100, 'description' => 'Densidade leve, aparência natural e discreta.', 'volume_level' => 'light', 'sort_order' => 1],
            ['name' => '130% (Natural)', 'slug' => 'densidade-130', 'percentage' => 130, 'description' => 'Densidade natural, equivale ao volume médio de cabelo real.', 'volume_level' => 'natural', 'sort_order' => 2],
            ['name' => '150% (Médio)', 'slug' => 'densidade-150', 'percentage' => 150, 'description' => 'Volume médio-cheio. A escolha mais popular.', 'volume_level' => 'medium', 'sort_order' => 3],
            ['name' => '180% (Cheio)', 'slug' => 'densidade-180', 'percentage' => 180, 'description' => 'Volume cheio e volumoso. Look glamoroso.', 'volume_level' => 'full', 'sort_order' => 4],
            ['name' => '200% (Muito Cheio)', 'slug' => 'densidade-200', 'percentage' => 200, 'description' => 'Volume máximo. Impactante e dramático.', 'volume_level' => 'very_full', 'sort_order' => 5],
            ['name' => '250% (Extra Cheio)', 'slug' => 'densidade-250', 'percentage' => 250, 'description' => 'Volume extremo. Para quem quer máximo impacto visual.', 'volume_level' => 'extra_full', 'sort_order' => 6],
        ];

        foreach ($densities as $data) {
            HairDensity::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}