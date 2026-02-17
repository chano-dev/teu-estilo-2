<?php

namespace Database\Seeders;

use App\Models\Length;
use Illuminate\Database\Seeder;

class LengthSeeder extends Seeder
{
    public function run(): void
    {
        $lengths = [
            ['name' => 'Curto', 'slug' => 'curto', 'description' => 'Comprimento acima do padrão, curto ou cropped.', 'sort_order' => 1],
            ['name' => 'Médio', 'slug' => 'medio', 'description' => 'Comprimento intermediário.', 'sort_order' => 2],
            ['name' => 'Longo', 'slug' => 'longo', 'description' => 'Comprimento abaixo do padrão, longo ou maxi.', 'sort_order' => 3],
            ['name' => 'Extra Longo', 'slug' => 'extra-longo', 'description' => 'Comprimento estendido, acima do convencional.', 'sort_order' => 4],
            ['name' => 'Cropped', 'slug' => 'cropped', 'description' => 'Comprimento reduzido, acima da cintura.', 'sort_order' => 5],
        ];

        foreach ($lengths as $data) {
            Length::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}
