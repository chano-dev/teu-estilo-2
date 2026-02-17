<?php

namespace Database\Seeders;

use App\Models\HairOrigin;
use Illuminate\Database\Seeder;

class HairOriginSeeder extends Seeder
{
    public function run(): void
    {
        $origins = [
            ['name' => 'Brasileiro', 'slug' => 'brasileiro', 'country_code' => 'BR', 'description' => 'Cabelo brasileiro, o mais popular mundialmente.', 'characteristics' => 'Versátil, grosso e durável. Boa retenção de cachos. Aceita bem coloração.', 'texture_profile' => 'varied', 'quality_tier' => 'premium', 'price_range' => 'high', 'sort_order' => 1],
            ['name' => 'Peruano', 'slug' => 'peruano', 'country_code' => 'PE', 'description' => 'Cabelo peruano, leve e versátil.', 'characteristics' => 'Mais leve que o brasileiro. Sedoso e brilhante. Pouco embaraçamento. Bom volume.', 'texture_profile' => 'wavy', 'quality_tier' => 'premium', 'price_range' => 'high', 'sort_order' => 2],
            ['name' => 'Indiano', 'slug' => 'indiano', 'country_code' => 'IN', 'description' => 'Cabelo indiano, naturalmente forte e brilhante.', 'characteristics' => 'Grossura média. Muito resistente. Textura similar ao cabelo africano processado. Excelente para coloração.', 'texture_profile' => 'straight', 'quality_tier' => 'premium', 'price_range' => 'medium', 'sort_order' => 3],
            ['name' => 'Malaio', 'slug' => 'malaio', 'country_code' => 'MY', 'description' => 'Cabelo malaio, extremamente sedoso.', 'characteristics' => 'Ultra-sedoso e liso. Brilho natural intenso. Leve e confortável. Menos volume.', 'texture_profile' => 'straight', 'quality_tier' => 'premium', 'price_range' => 'high', 'sort_order' => 4],
            ['name' => 'Cambojano', 'slug' => 'cambojano', 'country_code' => 'KH', 'description' => 'Cabelo cambojano, forte e duradouro.', 'characteristics' => 'Muito grosso e resistente. Mantém o estilo por mais tempo. Menos manutenção.', 'texture_profile' => 'straight', 'quality_tier' => 'standard', 'price_range' => 'medium', 'sort_order' => 5],
            ['name' => 'Mongol', 'slug' => 'mongol', 'country_code' => 'MN', 'description' => 'Cabelo mongol, denso e encorpado.', 'characteristics' => 'Cabelo grosso e denso. Excelente para texturas crespas. Forte e duradouro.', 'texture_profile' => 'curly', 'quality_tier' => 'premium', 'price_range' => 'high', 'sort_order' => 6],
            ['name' => 'Europeu', 'slug' => 'europeu', 'country_code' => null, 'description' => 'Cabelo europeu, o mais fino e natural.', 'characteristics' => 'Cabelo muito fino e sedoso. O mais natural para peles claras. Escasso e caro.', 'texture_profile' => 'straight', 'quality_tier' => 'luxury', 'price_range' => 'premium', 'sort_order' => 7],
            ['name' => 'Vietnamita', 'slug' => 'vietnamita', 'country_code' => 'VN', 'description' => 'Cabelo vietnamita, acessível e versátil.', 'characteristics' => 'Textura grossa e forte. Custo-benefício excelente. Aceita bem processos químicos.', 'texture_profile' => 'straight', 'quality_tier' => 'standard', 'price_range' => 'medium', 'sort_order' => 8],
            ['name' => 'Chinês', 'slug' => 'chines', 'country_code' => 'CN', 'description' => 'Cabelo chinês, grosso e abundante.', 'characteristics' => 'O mais grosso de todos. Muito abundante. Ideal para cabelos lisos longos. Preço acessível.', 'texture_profile' => 'straight', 'quality_tier' => 'standard', 'price_range' => 'low', 'sort_order' => 9],
        ];

        foreach ($origins as $data) {
            HairOrigin::query()->updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_active' => true]),
            );
        }
    }
}