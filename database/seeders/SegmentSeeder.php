<?php

namespace Database\Seeders;

use App\Models\Segment;
use Illuminate\Database\Seeder;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
$segments = [
    [
        'name' => 'Mulher',
        'slug' => 'mulher',
        'description' => 'Moda feminina — roupas, calçados, acessórios e cosméticos',
        'icon' => 'woman',
        'image_path' => null,
        'is_active' => true,
        'sort_order' => 1,
        'meta_title' => 'Moda Feminina | Teu Estilo',
        'meta_description' => 'Descobre as últimas tendências em moda feminina.',
    ],
    [
        'name' => 'Homem',
        'slug' => 'homem',
        'description' => 'Moda masculina — em breve',
        'icon' => 'man',
        'image_path' => null,
        'is_active' => false,
        'sort_order' => 2,
        'meta_title' => 'Moda Masculina | Teu Estilo',
        'meta_description' => 'Moda masculina em breve no Teu Estilo.',
    ],
    [
        'name' => 'Criança',
        'slug' => 'crianca',
        'description' => 'Moda infantil — em breve',
        'icon' => 'child',
        'image_path' => null,
        'is_active' => false,
        'sort_order' => 3,
        'meta_title' => 'Moda Infantil | Teu Estilo',
        'meta_description' => 'Moda infantil em breve no Teu Estilo.',
    ],
    [
        'name' => 'Blog',
        'slug' => 'blog',
        'description' => 'Dicas de moda, estilo e tendências',
        'icon' => 'newspaper',
        'image_path' => null,
        'is_active' => false,
        'sort_order' => 4,
        'meta_title' => 'Blog de Moda | Teu Estilo',
        'meta_description' => 'Artigos sobre moda, estilo e tendências angolanas.',
    ],
    [
        'name' => 'Sobre',
        'slug' => 'sobre',
        'description' => 'Sobre o Teu Estilo — quem somos e a nossa missão',
        'icon' => 'info-circle',
        'image_path' => null,
        'is_active' => true,
        'sort_order' => 5,
        'meta_title' => 'Sobre Nós | Teu Estilo',
        'meta_description' => 'Conhece o Teu Estilo — e-commerce angolano de moda.',
    ],
];

        foreach ($segments as $segment) {
            Segment::query()->updateOrCreate(
                ['slug' => $segment['slug']],
                $segment,
            );
        }
    }
}
