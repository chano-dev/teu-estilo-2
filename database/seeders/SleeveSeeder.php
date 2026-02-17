<?php

namespace Database\Seeders;

use App\Models\Sleeve;
use Illuminate\Database\Seeder;

class SleeveSeeder extends Seeder
{
    public function run(): void
    {
        $sleeves = [
            ['name' => 'Sem Manga', 'slug' => 'sem-manga', 'description' => 'Sem cobertura dos braços.', 'sort_order' => 1],
            ['name' => 'Manga Curta', 'slug' => 'manga-curta', 'description' => 'Manga acima do cotovelo.', 'sort_order' => 2],
            ['name' => 'Manga Três Quartos', 'slug' => 'manga-tres-quartos', 'description' => 'Manga entre o cotovelo e o pulso.', 'sort_order' => 3],
            ['name' => 'Manga Longa', 'slug' => 'manga-longa', 'description' => 'Manga até o pulso.', 'sort_order' => 4],
            ['name' => 'Manga Bufante', 'slug' => 'manga-bufante', 'description' => 'Manga com volume acentuado.', 'sort_order' => 5],
            ['name' => 'Manga Ajustada', 'slug' => 'manga-ajustada', 'description' => 'Manga justa ao braço.', 'sort_order' => 6],
        ];

        foreach ($sleeves as $data) {
            Sleeve::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}
