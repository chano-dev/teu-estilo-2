<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Segment;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    public function run(): void
    {
        // Buscar IDs dinamicamente (não hardcoded)
        $mulher = Segment::where('slug', 'mulher')->first();
        $roupas = Category::where('slug', 'roupas')->first();

        if (! $mulher || ! $roupas) {
            $this->command->error('❌ Segment "Mulher" ou Category "Roupas" não encontrados. Corre SegmentSeeder e CategorySeeder primeiro.');

            return;
        }

        $subcategories = [
            ['name' => 'Vestidos', 'slug' => 'vestidos', 'sku_code' => 'DRESS', 'description' => 'Vestidos elegantes para todas as ocasiões. Do casual ao formal, encontre o modelo perfeito para cada momento.', 'sort_order' => 1, 'meta_title' => 'Vestidos Femininos em Angola | Teu Estilo', 'meta_description' => 'Descubra vestidos elegantes em Luanda: longos, curtos, midi, de festa e casual.'],
            ['name' => 'Blusas', 'slug' => 'blusas', 'sku_code' => 'BLOUS', 'description' => 'Blusas modernas e versáteis para o dia a dia e ocasiões especiais.', 'sort_order' => 2, 'meta_title' => 'Blusas Femininas em Angola | Teu Estilo', 'meta_description' => 'Blusas femininas elegantes em Luanda: sociais, casuais, cropped e mais.'],
            ['name' => 'Blazers', 'slug' => 'blazers', 'sku_code' => 'BLAZR', 'description' => 'Blazers sofisticados para um look profissional e elegante.', 'sort_order' => 3, 'meta_title' => 'Blazers Femininos em Angola | Teu Estilo', 'meta_description' => 'Blazers femininos elegantes em Luanda: sociais, casuais e oversized.'],
            ['name' => 'Saias', 'slug' => 'saias', 'sku_code' => 'SKIRT', 'description' => 'Saias elegantes em diversos comprimentos e estilos.', 'sort_order' => 4, 'meta_title' => 'Saias Femininas em Angola | Teu Estilo', 'meta_description' => 'Saias femininas em Luanda: midi, longas, curtas, plissadas e de fenda.'],
            ['name' => 'Conjuntos', 'slug' => 'conjuntos', 'sku_code' => 'SETS', 'description' => 'Conjuntos coordenados prontos para usar. Praticidade e estilo.', 'sort_order' => 5, 'meta_title' => 'Conjuntos Femininos em Angola | Teu Estilo', 'meta_description' => 'Conjuntos femininos em Luanda: calça e blusa, saia e top, fatos completos.'],
            ['name' => 'Calças', 'slug' => 'calcas', 'sku_code' => 'PANTS', 'description' => 'Calças femininas versáteis para todas as ocasiões.', 'sort_order' => 6, 'meta_title' => 'Calças Femininas em Angola | Teu Estilo', 'meta_description' => 'Calças femininas em Luanda: jeans, sociais, palazzo, leggings e skinny.'],
            ['name' => 'Batas', 'slug' => 'batas', 'sku_code' => 'TUNIC', 'description' => 'Batas confortáveis e elegantes com toque de sofisticação africana.', 'sort_order' => 7, 'meta_title' => 'Batas Femininas em Angola | Teu Estilo', 'meta_description' => 'Batas femininas em Luanda: tradicionais, modernas e estampadas.'],
            ['name' => 'Camisas', 'slug' => 'camisas', 'sku_code' => 'SHIRT', 'description' => 'Camisas femininas clássicas e modernas.', 'sort_order' => 8, 'meta_title' => 'Camisas Femininas em Angola | Teu Estilo', 'meta_description' => 'Camisas femininas em Luanda: sociais, jeans, oversized e clássicas.'],
            ['name' => 'Fatos de Banho', 'slug' => 'fatos-de-banho', 'sku_code' => 'SWIMW', 'description' => 'Fatos de banho, biquínis e moda praia.', 'sort_order' => 9, 'meta_title' => 'Fatos de Banho e Biquínis em Angola | Teu Estilo', 'meta_description' => 'Fatos de banho e biquínis em Luanda: inteiros, de duas peças, saídas de praia.'],
            ['name' => 'Casacos', 'slug' => 'casacos', 'sku_code' => 'JACKT', 'description' => 'Casacos e jaquetas para os dias mais frescos.', 'sort_order' => 10, 'meta_title' => 'Casacos Femininos em Angola | Teu Estilo', 'meta_description' => 'Casacos femininos em Luanda: jaquetas, sobretudos, teddy e jeans.'],
        ];

        foreach ($subcategories as $data) {
            Subcategory::query()->updateOrCreate(
                [
                    'sku_code' => $data['sku_code'],
                ],
                array_merge($data, [
                    'category_id' => $roupas->id,
                    'segment_id' => $mulher->id,
                    'image_path' => null,
                    'is_active' => true,
                ]),
            );
        }
    }
}