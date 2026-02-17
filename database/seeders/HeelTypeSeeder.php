<?php

namespace Database\Seeders;

use App\Models\HeelType;
use Illuminate\Database\Seeder;

class HeelTypeSeeder extends Seeder
{
    public function run(): void
    {
        $heelTypes = [
            ['name' => 'Rasteiro', 'slug' => 'rasteiro', 'description' => 'Sem salto ou salto mínimo. Máximo conforto.', 'height_range' => '0-1cm', 'sort_order' => 1],
            ['name' => 'Salto Baixo', 'slug' => 'salto-baixo', 'description' => 'Salto discreto para uso diário confortável.', 'height_range' => '2-4cm', 'sort_order' => 2],
            ['name' => 'Salto Médio', 'slug' => 'salto-medio', 'description' => 'Equilíbrio entre conforto e elegância.', 'height_range' => '5-7cm', 'sort_order' => 3],
            ['name' => 'Salto Alto', 'slug' => 'salto-alto', 'description' => 'Salto elevado para ocasiões elegantes.', 'height_range' => '8-10cm', 'sort_order' => 4],
            ['name' => 'Salto Agulha', 'slug' => 'salto-agulha', 'description' => 'Salto fino e alto, máxima elegância.', 'height_range' => '8-12cm', 'sort_order' => 5],
            ['name' => 'Salto Grosso', 'slug' => 'salto-grosso', 'description' => 'Salto largo e estável, conforto com altura.', 'height_range' => '5-10cm', 'sort_order' => 6],
            ['name' => 'Salto Bloco', 'slug' => 'salto-bloco', 'description' => 'Salto quadrado e robusto, muito estável.', 'height_range' => '4-8cm', 'sort_order' => 7],
            ['name' => 'Anabela', 'slug' => 'anabela', 'description' => 'Salto corrido tipo cunha, confortável.', 'height_range' => '5-10cm', 'sort_order' => 8],
            ['name' => 'Plataforma', 'slug' => 'plataforma', 'description' => 'Sola elevada na frente, reduz inclinação.', 'height_range' => '3-8cm', 'sort_order' => 9],
        ];

        foreach ($heelTypes as $data) {
            HeelType::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}
