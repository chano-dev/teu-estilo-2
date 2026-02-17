<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        $colors = [
            // === NEUTROS ===
            ['name' => 'Branco', 'hex_code' => '#FFFFFF', 'sort_order' => 1],
            ['name' => 'Branco Gelo', 'hex_code' => '#F8F8FF', 'sort_order' => 2],
            ['name' => 'Creme', 'hex_code' => '#FFFDD0', 'sort_order' => 3],
            ['name' => 'Bege', 'hex_code' => '#F5F5DC', 'sort_order' => 4],
            ['name' => 'Bege Escuro', 'hex_code' => '#D2B48C', 'sort_order' => 5],
            ['name' => 'Castanho Claro', 'hex_code' => '#D2691E', 'sort_order' => 6],
            ['name' => 'Castanho', 'hex_code' => '#8B4513', 'sort_order' => 7],
            ['name' => 'Castanho Escuro', 'hex_code' => '#5C4033', 'sort_order' => 8],
            ['name' => 'Caramelo', 'hex_code' => '#FFD59A', 'sort_order' => 9],
            ['name' => 'Chocolate', 'hex_code' => '#7B3F00', 'sort_order' => 10],
            ['name' => 'Nude', 'hex_code' => '#E3BC9A', 'sort_order' => 11],

            // === PRETOS E CINZAS ===
            ['name' => 'Preto', 'hex_code' => '#000000', 'sort_order' => 12],
            ['name' => 'Cinza Claro', 'hex_code' => '#D3D3D3', 'sort_order' => 13],
            ['name' => 'Cinza', 'hex_code' => '#808080', 'sort_order' => 14],
            ['name' => 'Cinza Escuro', 'hex_code' => '#404040', 'sort_order' => 15],
            ['name' => 'Cinza Chumbo', 'hex_code' => '#36454F', 'sort_order' => 16],
            ['name' => 'Prata', 'hex_code' => '#C0C0C0', 'sort_order' => 17],
            ['name' => 'Carvão', 'hex_code' => '#36454F', 'sort_order' => 18],

            // === VERMELHOS ===
            ['name' => 'Vermelho', 'hex_code' => '#FF0000', 'sort_order' => 19],
            ['name' => 'Vermelho Claro', 'hex_code' => '#FF6B6B', 'sort_order' => 20],
            ['name' => 'Vermelho Escuro', 'hex_code' => '#8B0000', 'sort_order' => 21],
            ['name' => 'Vermelho Vinho', 'hex_code' => '#722F37', 'sort_order' => 22],
            ['name' => 'Bordô', 'hex_code' => '#800020', 'sort_order' => 23],
            ['name' => 'Coral', 'hex_code' => '#FF7F50', 'sort_order' => 24],
            ['name' => 'Terracota', 'hex_code' => '#E2725B', 'sort_order' => 25],

            // === ROSAS ===
            ['name' => 'Rosa', 'hex_code' => '#FFC0CB', 'sort_order' => 26],
            ['name' => 'Rosa Claro', 'hex_code' => '#FFB6C1', 'sort_order' => 27],
            ['name' => 'Rosa Choque', 'hex_code' => '#FF69B4', 'sort_order' => 28],
            ['name' => 'Rosa Escuro', 'hex_code' => '#E75480', 'sort_order' => 29],
            ['name' => 'Rosa Salmão', 'hex_code' => '#FF91A4', 'sort_order' => 30],
            ['name' => 'Fúcsia', 'hex_code' => '#FF00FF', 'sort_order' => 31],
            ['name' => 'Magenta', 'hex_code' => '#FF0090', 'sort_order' => 32],
            ['name' => 'Rosa Velho', 'hex_code' => '#C08081', 'sort_order' => 33],

            // === LARANJAS ===
            ['name' => 'Laranja', 'hex_code' => '#FFA500', 'sort_order' => 34],
            ['name' => 'Laranja Claro', 'hex_code' => '#FFD580', 'sort_order' => 35],
            ['name' => 'Laranja Escuro', 'hex_code' => '#FF8C00', 'sort_order' => 36],
            ['name' => 'Pêssego', 'hex_code' => '#FFCBA4', 'sort_order' => 37],
            ['name' => 'Damasco', 'hex_code' => '#FBCEB1', 'sort_order' => 38],

            // === AMARELOS ===
            ['name' => 'Amarelo', 'hex_code' => '#FFFF00', 'sort_order' => 39],
            ['name' => 'Amarelo Claro', 'hex_code' => '#FFFFE0', 'sort_order' => 40],
            ['name' => 'Amarelo Escuro', 'hex_code' => '#FFD700', 'sort_order' => 41],
            ['name' => 'Amarelo Mostarda', 'hex_code' => '#FFDB58', 'sort_order' => 42],
            ['name' => 'Dourado', 'hex_code' => '#FFD700', 'sort_order' => 43],
            ['name' => 'Champanhe', 'hex_code' => '#F7E7CE', 'sort_order' => 44],
            ['name' => 'Ouro Rosa', 'hex_code' => '#B76E79', 'sort_order' => 45],

            // === VERDES ===
            ['name' => 'Verde', 'hex_code' => '#008000', 'sort_order' => 46],
            ['name' => 'Verde Claro', 'hex_code' => '#90EE90', 'sort_order' => 47],
            ['name' => 'Verde Escuro', 'hex_code' => '#006400', 'sort_order' => 48],
            ['name' => 'Verde Limão', 'hex_code' => '#32CD32', 'sort_order' => 49],
            ['name' => 'Verde Menta', 'hex_code' => '#98FF98', 'sort_order' => 50],
            ['name' => 'Verde Esmeralda', 'hex_code' => '#50C878', 'sort_order' => 51],
            ['name' => 'Verde Militar', 'hex_code' => '#4B5320', 'sort_order' => 52],
            ['name' => 'Verde Oliva', 'hex_code' => '#808000', 'sort_order' => 53],
            ['name' => 'Verde Garrafa', 'hex_code' => '#004B49', 'sort_order' => 54],
            ['name' => 'Turquesa', 'hex_code' => '#40E0D0', 'sort_order' => 55],
            ['name' => 'Água', 'hex_code' => '#00FFFF', 'sort_order' => 56],

            // === AZUIS ===
            ['name' => 'Azul', 'hex_code' => '#0000FF', 'sort_order' => 57],
            ['name' => 'Azul Claro', 'hex_code' => '#ADD8E6', 'sort_order' => 58],
            ['name' => 'Azul Escuro', 'hex_code' => '#00008B', 'sort_order' => 59],
            ['name' => 'Azul Bebé', 'hex_code' => '#89CFF0', 'sort_order' => 60],
            ['name' => 'Azul Celeste', 'hex_code' => '#87CEEB', 'sort_order' => 61],
            ['name' => 'Azul Royal', 'hex_code' => '#4169E1', 'sort_order' => 62],
            ['name' => 'Azul Marinho', 'hex_code' => '#000080', 'sort_order' => 63],
            ['name' => 'Azul Petróleo', 'hex_code' => '#006A6A', 'sort_order' => 64],
            ['name' => 'Azul Turquesa', 'hex_code' => '#30D5C8', 'sort_order' => 65],
            ['name' => 'Azul Cobalto', 'hex_code' => '#0047AB', 'sort_order' => 66],
            ['name' => 'Jeans', 'hex_code' => '#1560BD', 'sort_order' => 67],

            // === ROXOS E LILÁS ===
            ['name' => 'Roxo', 'hex_code' => '#800080', 'sort_order' => 68],
            ['name' => 'Roxo Claro', 'hex_code' => '#DDA0DD', 'sort_order' => 69],
            ['name' => 'Roxo Escuro', 'hex_code' => '#4B0082', 'sort_order' => 70],
            ['name' => 'Lilás', 'hex_code' => '#C8A2C8', 'sort_order' => 71],
            ['name' => 'Lavanda', 'hex_code' => '#E6E6FA', 'sort_order' => 72],
            ['name' => 'Violeta', 'hex_code' => '#EE82EE', 'sort_order' => 73],
            ['name' => 'Ameixa', 'hex_code' => '#8E4585', 'sort_order' => 74],
            ['name' => 'Uva', 'hex_code' => '#6F2DA8', 'sort_order' => 75],
            ['name' => 'Berinjela', 'hex_code' => '#614051', 'sort_order' => 76],

            // === METÁLICOS ===
            ['name' => 'Bronze', 'hex_code' => '#CD7F32', 'sort_order' => 77],
            ['name' => 'Cobre', 'hex_code' => '#B87333', 'sort_order' => 78],
            ['name' => 'Rose Gold', 'hex_code' => '#B76E79', 'sort_order' => 79],

            // === ESPECIAIS ===
            ['name' => 'Multicolor', 'hex_code' => null, 'sort_order' => 80],
            ['name' => 'Estampado', 'hex_code' => null, 'sort_order' => 81],
            ['name' => 'Transparente', 'hex_code' => null, 'sort_order' => 82],
            ['name' => 'Neon', 'hex_code' => '#39FF14', 'sort_order' => 83],
        ];

        foreach ($colors as $color) {
            Color::query()->updateOrCreate(
                ['slug' => Str::slug($color['name'])],
                array_merge($color, [
                    'slug' => Str::slug($color['name']),
                    'is_active' => true,
                ]),
            );
        }
    }
}