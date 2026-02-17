<?php

namespace Database\Seeders;

use App\Models\CapType;
use Illuminate\Database\Seeder;

class CapTypeSeeder extends Seeder
{
    public function run(): void
    {
        $capTypes = [
            ['name' => 'Lace Front', 'slug' => 'lace-front', 'description' => 'Renda na parte frontal para linha natural do cabelo.', 'characteristics' => 'Renda transparente na frente. Permite pentear para trás. Linha do cabelo realista.', 'naturalness_level' => 'high', 'ease_of_use' => 'moderate', 'sort_order' => 1],
            ['name' => 'Full Lace', 'slug' => 'full-lace', 'description' => 'Renda em toda a touca. Máxima versatilidade de penteados.', 'characteristics' => 'Renda em 360°. Pode fazer rabo de cavalo. Máxima ventilação. Mais delicada.', 'naturalness_level' => 'very_high', 'ease_of_use' => 'advanced', 'sort_order' => 2],
            ['name' => '360 Lace', 'slug' => '360-lace', 'description' => 'Renda ao redor de toda a cabeça com espaço sólido no topo.', 'characteristics' => 'Renda periférica completa. Permite rabos altos. Mais durável que Full Lace.', 'naturalness_level' => 'very_high', 'ease_of_use' => 'advanced', 'sort_order' => 3],
            ['name' => 'Closure (4x4)', 'slug' => 'closure-4x4', 'description' => 'Peça de renda 4x4cm no topo para fecho natural.', 'characteristics' => 'Renda pequena no topo. Fácil aplicação. Bom custo-benefício. Risca natural.', 'naturalness_level' => 'medium', 'ease_of_use' => 'easy', 'sort_order' => 4],
            ['name' => 'Closure (5x5)', 'slug' => 'closure-5x5', 'description' => 'Peça de renda 5x5cm. Mais espaço para risca que a 4x4.', 'characteristics' => 'Renda média no topo. Mais opções de risca. Aplicação simples.', 'naturalness_level' => 'medium', 'ease_of_use' => 'easy', 'sort_order' => 5],
            ['name' => 'Frontal (13x4)', 'slug' => 'frontal-13x4', 'description' => 'Renda frontal de 13x4cm. Cobertura de orelha a orelha.', 'characteristics' => 'Renda de orelha a orelha. Profundidade de 4cm. Linha frontal completa.', 'naturalness_level' => 'high', 'ease_of_use' => 'moderate', 'sort_order' => 6],
            ['name' => 'Frontal (13x6)', 'slug' => 'frontal-13x6', 'description' => 'Renda frontal de 13x6cm. Mais profundidade para risca livre.', 'characteristics' => 'Maior área de renda frontal. Risca livre até 6cm. Muito natural.', 'naturalness_level' => 'high', 'ease_of_use' => 'moderate', 'sort_order' => 7],
            ['name' => 'U-Part', 'slug' => 'u-part', 'description' => 'Abertura em U no topo para misturar com cabelo natural.', 'characteristics' => 'Blending com cabelo próprio. Sem cola necessária. Fácil aplicação e remoção.', 'naturalness_level' => 'medium', 'ease_of_use' => 'easy', 'sort_order' => 8],
            ['name' => 'Headband Wig', 'slug' => 'headband-wig', 'description' => 'Peruca com faixa/banda integrada. Sem cola, sem renda.', 'characteristics' => 'Aplicação instantânea. Sem preparação. Confortável para uso diário. Ideal para iniciantes.', 'naturalness_level' => 'low', 'ease_of_use' => 'easy', 'sort_order' => 9],
            ['name' => 'Glueless', 'slug' => 'glueless', 'description' => 'Peruca que dispensa cola. Fixação por pentes e elástico.', 'characteristics' => 'Sem danos ao couro cabeludo. Fácil colocar e tirar. Pentes ajustáveis internos.', 'naturalness_level' => 'medium', 'ease_of_use' => 'easy', 'sort_order' => 10],
            ['name' => 'HD Lace', 'slug' => 'hd-lace', 'description' => 'Renda ultra-fina e invisível. Premium para aspecto mais natural.', 'characteristics' => 'Renda praticamente invisível. Derrete na pele. Aspecto de cabelo nascendo do couro cabeludo.', 'naturalness_level' => 'very_high', 'ease_of_use' => 'advanced', 'sort_order' => 11],
        ];

        foreach ($capTypes as $data) {
            CapType::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}