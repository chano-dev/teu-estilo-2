<?php

namespace Database\Seeders;

use App\Models\Closure;
use Illuminate\Database\Seeder;

class ClosureSeeder extends Seeder
{
    public function run(): void
    {
        $closures = [
            ['name' => 'Zíper', 'slug' => 'ziper', 'description' => 'Fecho em metal ou plástico usado em roupas, calçados e bolsas.', 'sort_order' => 1],
            ['name' => 'Botões', 'slug' => 'botoes', 'description' => 'Fecho clássico com botões de plástico, metal, madeira ou tecido.', 'sort_order' => 2],
            ['name' => 'Velcro', 'slug' => 'velcro', 'description' => 'Sistema aderente prático, comum em calçados e acessórios.', 'sort_order' => 3],
            ['name' => 'Elástico', 'slug' => 'elastico', 'description' => 'Ajuste flexível sem fecho mecânico.', 'sort_order' => 4],
            ['name' => 'Fivela', 'slug' => 'fivela', 'description' => 'Fecho com ajuste manual, comum em cintos, sandálias e bolsas.', 'sort_order' => 5],
            ['name' => 'Amarração', 'slug' => 'amarracao', 'description' => 'Cordões, laços ou fitas para fechamento ajustável.', 'sort_order' => 6],
            ['name' => 'Pressão', 'slug' => 'pressao', 'description' => 'Botões de encaixe rápido, discretos e práticos.', 'sort_order' => 7],
            ['name' => 'Magnético', 'slug' => 'magnetico', 'description' => 'Fecho por ímãs, comum em bolsas e joias.', 'sort_order' => 8],
            ['name' => 'Sem Fecho', 'slug' => 'sem-fecho', 'description' => 'Produto sem sistema de fechamento.', 'sort_order' => 9],
        ];

        foreach ($closures as $data) {
            Closure::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}
