<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Roupas',
                'slug' => 'roupas',
                'description' => 'Vestidos, blusas, calças, saias e mais',
                'icon' => 'shirt',
                'is_active' => true,
                'sort_order' => 1,
                'meta_title' => 'Roupas Femininas | Teu Estilo',
                'meta_description' => 'Encontra as melhores roupas femininas em Angola.',
            ],
            [
                'name' => 'Calçados',
                'slug' => 'calcados',
                'description' => 'Saltos, sandálias, ténis e sapatilhas',
                'icon' => 'shoe',
                'is_active' => false,
                'sort_order' => 2,
                'meta_title' => 'Calçados Femininos | Teu Estilo',
                'meta_description' => 'Os melhores calçados femininos em Angola.',
            ],
            [
                'name' => 'Acessórios',
                'slug' => 'acessorios',
                'description' => 'Bolsas, bijuteria, cintos, óculos e mais',
                'icon' => 'handbag',
                'is_active' => false,
                'sort_order' => 3,
                'meta_title' => 'Acessórios de Moda | Teu Estilo',
                'meta_description' => 'Acessórios de moda para completar o teu estilo.',
            ],
            [
                'name' => 'Cosméticos',
                'slug' => 'cosmeticos',
                'description' => 'Maquilhagem, perfumes, cuidados de pele e cabelo',
                'icon' => 'sparkles',
                'is_active' => false,
                'sort_order' => 4,
                'meta_title' => 'Cosméticos | Teu Estilo',
                'meta_description' => 'Cosméticos e produtos de beleza em Angola.',
            ],
            [
                'name' => 'Serviços',
                'slug' => 'servicos',
                'description' => 'Serviços para o seu estilo — alfaiataria e costura, compras na Shein, Aliexpress e mais.',
                'icon' => 'star',
                'is_active' => true,
                'sort_order' => 5,
                'meta_title' => 'Serviços de Moda | Teu Estilo',
                'meta_description' => 'Serviços para o seu estilo — alfaiataria e costura, compras na Shein, Aliexpress e mais.',
            ],
        ];

        foreach ($categories as $category) {
            Category::query()->updateOrCreate(
                ['slug' => $category['slug']],
                $category,
            );
        }
    }
}