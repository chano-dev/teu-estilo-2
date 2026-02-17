<?php

namespace Database\Seeders;

use App\Models\Pattern;
use Illuminate\Database\Seeder;

class PatternSeeder extends Seeder
{
    public function run(): void
    {
        $patterns = [
            ['name' => 'Liso', 'slug' => 'liso', 'description' => 'Sem estampas ou texturas visíveis — cor uniforme.', 'sort_order' => 1],
            ['name' => 'Floral', 'slug' => 'floral', 'description' => 'Estampas com flores, desde delicadas a tropicais.', 'sort_order' => 2],
            ['name' => 'Listras', 'slug' => 'listras', 'description' => 'Linhas verticais, horizontais ou diagonais.', 'sort_order' => 3],
            ['name' => 'Animal Print', 'slug' => 'animal-print', 'description' => 'Padrões inspirados em peles animais: onça, zebra, cobra, etc.', 'sort_order' => 4],
            ['name' => 'Xadrez', 'slug' => 'xadrez', 'description' => 'Padrão quadriculado em cores contrastantes.', 'sort_order' => 5],
            ['name' => 'Pois', 'slug' => 'pois', 'description' => 'Círculos repetidos, também conhecido como "bolinhas".', 'sort_order' => 6],
            ['name' => 'Geométrico', 'slug' => 'geometrico', 'description' => 'Formas como triângulos, losangos, hexágonos ou abstrações.', 'sort_order' => 7],
            ['name' => 'Tie-Dye', 'slug' => 'tie-dye', 'description' => 'Efeito degradê colorido, com transições fluidas entre cores.', 'sort_order' => 8],
            ['name' => 'Tecido Nacional', 'slug' => 'tecido-nacional', 'description' => 'Padrões tradicionais angolanos ou africanos (ex: capulana).', 'sort_order' => 9],
            ['name' => 'Abstrato', 'slug' => 'abstrato', 'description' => 'Desenhos não figurativos, com pinceladas ou formas livres.', 'sort_order' => 10],
            ['name' => 'Camuflado', 'slug' => 'camuflado', 'description' => 'Padrão militar com tons verdes, castanhos ou urbanos.', 'sort_order' => 11],
            ['name' => 'Multicolor', 'slug' => 'multicolor', 'description' => 'Combinação vibrante de várias cores sem padrão fixo.', 'sort_order' => 12],
        ];

        foreach ($patterns as $data) {
            Pattern::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}
