<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    public function run(): void
    {
        $certifications = [
            ['name' => 'Orgânico', 'slug' => 'organico', 'certification_type' => 'eco', 'icon' => 'leaf', 'description' => 'Matéria prima cultivada sem pesticidas.', 'sort_order' => 1],
            ['name' => 'Sustentável', 'slug' => 'sustentavel', 'certification_type' => 'eco', 'icon' => 'recycle', 'description' => 'Processos com baixo impacto ambiental.', 'sort_order' => 2],
            ['name' => 'Cruelty Free', 'slug' => 'cruelty-free', 'certification_type' => 'animal', 'icon' => 'paw', 'description' => 'Não testado em animais.', 'sort_order' => 3],
            ['name' => 'Vegan', 'slug' => 'vegan', 'certification_type' => 'animal', 'icon' => 'seedling', 'description' => 'Sem ingredientes de origem animal.', 'sort_order' => 4],
            ['name' => 'Dermatologicamente Testado', 'slug' => 'dermatologicamente-testado', 'certification_type' => 'health', 'icon' => 'check', 'description' => 'Seguro para uso na pele.', 'sort_order' => 5],
            ['name' => 'Alta Qualidade', 'slug' => 'alta-qualidade', 'certification_type' => 'quality', 'icon' => 'award', 'description' => 'Padrão elevado de acabamento e durabilidade.', 'sort_order' => 6],
            ['name' => 'Feito em Angola', 'slug' => 'feito-em-angola', 'certification_type' => 'origin', 'icon' => 'flag', 'description' => 'Produto de origem nacional.', 'sort_order' => 7],
            ['name' => 'Importado', 'slug' => 'importado', 'certification_type' => 'origin', 'icon' => 'globe', 'description' => 'Produto de origem internacional.', 'sort_order' => 8],
        ];

        foreach ($certifications as $data) {
            Certification::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}
