<?php

namespace Database\Seeders;

use App\Models\Fit;
use Illuminate\Database\Seeder;

class FitSeeder extends Seeder
{
    public function run(): void
    {
        $fits = [
            ['name' => 'Slim', 'slug' => 'slim', 'description' => 'Caimento justo ao corpo, valorizando a silhueta.', 'sort_order' => 1],
            ['name' => 'Regular', 'slug' => 'regular', 'description' => 'Caimento padrão, equilibrado entre conforto e forma.', 'sort_order' => 2],
            ['name' => 'Oversized', 'slug' => 'oversized', 'description' => 'Modelagem larga e solta, inspirada no streetwear.', 'sort_order' => 3],
            ['name' => 'Relaxed', 'slug' => 'relaxed', 'description' => 'Mais folgado que o regular, priorizando conforto.', 'sort_order' => 4],
            ['name' => 'Skinny', 'slug' => 'skinny', 'description' => 'Extremamente ajustado, comum em calças e jeans.', 'sort_order' => 5],
            ['name' => 'Tailored', 'slug' => 'tailored', 'description' => 'Ajuste sob medida, comum em alfaiataria.', 'sort_order' => 6],
        ];

        foreach ($fits as $data) {
            Fit::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}
