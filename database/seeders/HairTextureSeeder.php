<?php

namespace Database\Seeders;

use App\Models\HairTexture;
use Illuminate\Database\Seeder;

class HairTextureSeeder extends Seeder
{
    public function run(): void
    {
        $textures = [
            ['name' => 'Liso (Straight)', 'slug' => 'liso', 'description' => 'Cabelo completamente liso, sem ondulação.', 'curl_pattern' => '1A-1C', 'characteristics' => 'Sem curvatura. Brilhante naturalmente. Escorrega facilmente.', 'styling_tips' => 'Fácil de manter. Pode adicionar volume com babyliss ou rolos.', 'sort_order' => 1],
            ['name' => 'Body Wave', 'slug' => 'body-wave', 'description' => 'Ondas suaves e largas em formato S.', 'curl_pattern' => '2A', 'characteristics' => 'Ondas suaves e naturais. Volume moderado. Movimento fluido.', 'styling_tips' => 'Muito versátil. Pode alisar ou acentuar as ondas. Popular em Angola.', 'sort_order' => 2],
            ['name' => 'Ondulado (Loose Wave)', 'slug' => 'ondulado', 'description' => 'Ondas definidas mas soltas.', 'curl_pattern' => '2B-2C', 'characteristics' => 'Ondas mais definidas que body wave. Volume médio-alto. Aspecto praiano.', 'styling_tips' => 'Usar produtos anti-frizz. Secar ao natural para melhor resultado.', 'sort_order' => 3],
            ['name' => 'Deep Wave', 'slug' => 'deep-wave', 'description' => 'Ondas profundas e bem definidas.', 'curl_pattern' => '2C-3A', 'characteristics' => 'Ondas marcadas e profundas. Muito volume. Textura dramática.', 'styling_tips' => 'Hidratar frequentemente. Usar pente de dentes largos.', 'sort_order' => 4],
            ['name' => 'Cacheado (Curly)', 'slug' => 'cacheado', 'description' => 'Cachos bem formados e definidos.', 'curl_pattern' => '3A-3C', 'characteristics' => 'Cachos em espiral definidos. Alto volume. Movimento natural.', 'styling_tips' => 'Usar creme de pentear. Não escovar seco. Técnica "scrunch" recomendada.', 'sort_order' => 5],
            ['name' => 'Crespo (Kinky Curly)', 'slug' => 'crespo', 'description' => 'Cachos muito apertados e densos.', 'curl_pattern' => '4A-4B', 'characteristics' => 'Cachos apertados. Máximo volume. Encolhimento natural. Textura densa.', 'styling_tips' => 'Hidratar muito. Desembaraçar com condicionador. Proteger à noite com touca de cetim.', 'sort_order' => 6],
            ['name' => 'Afro (Coily)', 'slug' => 'afro', 'description' => 'Textura afro natural, cachos muito compactos.', 'curl_pattern' => '4C', 'characteristics' => 'Cachos extremamente compactos. Muito volume quando solto. Textura densa e macia.', 'styling_tips' => 'Rotina de hidratação intensa. Penteados protetores recomendados. Óleo de coco ou karité.', 'sort_order' => 7],
            ['name' => 'Yaki', 'slug' => 'yaki', 'description' => 'Textura que imita cabelo africano alisado.', 'curl_pattern' => null, 'characteristics' => 'Simula cabelo natural processado. Aspecto realista para mulheres negras. Textura ligeiramente rugosa.', 'styling_tips' => 'Óptimo para blending com cabelo natural alisado. Baixa manutenção.', 'sort_order' => 8],
            ['name' => 'Water Wave', 'slug' => 'water-wave', 'description' => 'Ondas irregulares como se estivesse molhado.', 'curl_pattern' => '2A-2B', 'characteristics' => 'Aspecto "wet look" natural. Ondas fluidas e orgânicas. Volume moderado.', 'styling_tips' => 'Usar gel para efeito molhado. Bonito em qualquer comprimento.', 'sort_order' => 9],
        ];

        foreach ($textures as $data) {
            HairTexture::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}