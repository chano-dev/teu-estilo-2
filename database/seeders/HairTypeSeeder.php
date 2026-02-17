<?php

namespace Database\Seeders;

use App\Models\HairType;
use Illuminate\Database\Seeder;

class HairTypeSeeder extends Seeder
{
    public function run(): void
    {
        $hairTypes = [
            [
                'name' => 'Cabelo Natural Virgem',
                'slug' => 'cabelo-natural-virgem',
                'description' => 'Cabelo humano nunca processado quimicamente. Máxima qualidade e naturalidade.',
                'characteristics' => 'Cutículas intactas e alinhadas. Sem tratamento químico. Textura original preservada. Brilho natural.',
                'durability' => '2-3 anos',
                'price_range' => 'premium',
                'can_be_dyed' => true,
                'can_be_heat_styled' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Cabelo Remy',
                'slug' => 'cabelo-remy',
                'description' => 'Cabelo humano com cutículas alinhadas na mesma direção. Ótima qualidade.',
                'characteristics' => 'Cutículas alinhadas. Mínimo embaraçamento. Aparência natural. Toque sedoso.',
                'durability' => '1-2 anos',
                'price_range' => 'high',
                'can_be_dyed' => true,
                'can_be_heat_styled' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Cabelo Non-Remy',
                'slug' => 'cabelo-non-remy',
                'description' => 'Cabelo humano processado. Cutículas removidas e recobertas com silicone.',
                'characteristics' => 'Tratado com silicone. Mais acessível. Pode embaraçar com o tempo. Necessita mais cuidado.',
                'durability' => '6-12 meses',
                'price_range' => 'medium',
                'can_be_dyed' => true,
                'can_be_heat_styled' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Sintético Premium',
                'slug' => 'sintetico-premium',
                'description' => 'Fibra sintética de alta qualidade que imita cabelo natural.',
                'characteristics' => 'Fibras avançadas. Aspecto realista. Leve e confortável. Mantém o estilo após lavagem.',
                'durability' => '3-6 meses',
                'price_range' => 'medium',
                'can_be_dyed' => false,
                'can_be_heat_styled' => false,
                'sort_order' => 4,
            ],
            [
                'name' => 'Sintético Standard',
                'slug' => 'sintetico-standard',
                'description' => 'Fibra sintética básica. Opção económica para uso ocasional.',
                'characteristics' => 'Fibra básica. Brilho artificial. Estilo pré-definido. Mais rígido ao toque.',
                'durability' => '1-3 meses',
                'price_range' => 'low',
                'can_be_dyed' => false,
                'can_be_heat_styled' => false,
                'sort_order' => 5,
            ],
            [
                'name' => 'Heat Friendly',
                'slug' => 'heat-friendly',
                'description' => 'Fibra sintética resistente ao calor. Permite modelar com ferramentas térmicas.',
                'characteristics' => 'Suporta até 180°C. Permite alisar e ondular. Mais versátil que sintético comum. Aspecto mais natural.',
                'durability' => '3-6 meses',
                'price_range' => 'medium',
                'can_be_dyed' => false,
                'can_be_heat_styled' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Mistura Natural + Sintético',
                'slug' => 'mistura-natural-sintetico',
                'description' => 'Combinação de cabelo humano com fibra sintética. Equilíbrio entre qualidade e preço.',
                'characteristics' => 'Combina naturalidade com praticidade. Preço intermediário. Boa aparência. Manutenção moderada.',
                'durability' => '6-12 meses',
                'price_range' => 'medium',
                'can_be_dyed' => false,
                'can_be_heat_styled' => true,
                'sort_order' => 7,
            ],
        ];

        foreach ($hairTypes as $data) {
            HairType::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}