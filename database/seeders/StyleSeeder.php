<?php

namespace Database\Seeders;

use App\Models\Style;
use Illuminate\Database\Seeder;

class StyleSeeder extends Seeder
{
    public function run(): void
    {
        $styles = [
            ['name' => 'Casual', 'slug' => 'casual', 'description' => 'Confortável, descontraído e versátil para o dia a dia.', 'sort_order' => 1],
            ['name' => 'Elegante', 'slug' => 'elegante', 'description' => 'Refinado, polido e sofisticado — ideal para ocasiões importantes.', 'sort_order' => 2],
            ['name' => 'Boémio', 'slug' => 'boemio', 'description' => 'Livres, fluidos, com camadas e detalhes artesanais — estilo nómada.', 'sort_order' => 3],
            ['name' => 'Vintage', 'slug' => 'vintage', 'description' => 'Inspirado em décadas passadas — anos 60, 70, 80 ou 90.', 'sort_order' => 4],
            ['name' => 'Minimalista', 'slug' => 'minimalista', 'description' => 'Linhas limpas, cores neutras e sem excessos — "less is more".', 'sort_order' => 5],
            ['name' => 'Sexy', 'slug' => 'sexy', 'description' => 'Ajustado, com recortes, transparências ou decotes marcantes.', 'sort_order' => 6],
            ['name' => 'Streetwear', 'slug' => 'streetwear', 'description' => 'Inspirado na cultura urbana — oversized, logomania, sneakers.', 'sort_order' => 7],
            ['name' => 'Clássico', 'slug' => 'classico', 'description' => 'Atemporal, com peças como blazers, trench coats e calças retas.', 'sort_order' => 8],
            ['name' => 'Moda Étnica', 'slug' => 'moda-etnica', 'description' => 'Peças com padrões, tecidos ou cortes inspirados em culturas africanas.', 'sort_order' => 9],
            ['name' => 'Glamour', 'slug' => 'glamour', 'description' => 'Brilhos, lantejoulas, tecidos luxuosos e silhuetas dramáticas.', 'sort_order' => 10],
            ['name' => 'Sustentável', 'slug' => 'sustentavel', 'description' => 'Produzido com materiais ecológicos ou processos éticos.', 'sort_order' => 11],
            ['name' => 'Experimental', 'slug' => 'experimental', 'description' => 'Design inovador, cortes assimétricos, materiais não convencionais.', 'sort_order' => 12],
        ];

        foreach ($styles as $data) {
            Style::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}
