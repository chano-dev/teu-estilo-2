<?php

namespace Database\Seeders;

use App\Models\Neckline;
use Illuminate\Database\Seeder;

class NecklineSeeder extends Seeder
{
    public function run(): void
    {
        $necklines = [
            ['name' => 'Gola Redonda', 'slug' => 'gola-redonda', 'description' => 'Gola circular clássica.', 'sort_order' => 1],
            ['name' => 'Gola V', 'slug' => 'gola-v', 'description' => 'Decote em formato V.', 'sort_order' => 2],
            ['name' => 'Gola Alta', 'slug' => 'gola-alta', 'description' => 'Cobre total ou parcialmente o pescoço.', 'sort_order' => 3],
            ['name' => 'Tomara que Caia', 'slug' => 'tomara-que-caia', 'description' => 'Sem alças, deixa os ombros à mostra.', 'sort_order' => 4],
            ['name' => 'Ombro a Ombro', 'slug' => 'ombro-a-ombro', 'description' => 'Decote largo que expõe os ombros.', 'sort_order' => 5],
            ['name' => 'Assimétrico', 'slug' => 'assimetrico', 'description' => 'Corte irregular ou não simétrico.', 'sort_order' => 6],
        ];

        foreach ($necklines as $data) {
            Neckline::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}
