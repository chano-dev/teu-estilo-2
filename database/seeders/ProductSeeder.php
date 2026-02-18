<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Fetch references dynamically
        $vestidos = Subcategory::where('sku_code', 'DRESS')->first();
        $blusas = Subcategory::where('sku_code', 'BLOUS')->first();
        $blazers = Subcategory::where('sku_code', 'BLAZR')->first();
        $saias = Subcategory::where('sku_code', 'SKIRT')->first();
        $conjuntos = Subcategory::where('sku_code', 'SETS')->first();

        $zara = Brand::where('slug', 'zara')->first();
        $shein = Brand::where('slug', 'shein')->first();
        $generico = Brand::where('slug', 'generico')->first();

        $verao = Collection::where('slug', 'verao-2026')->first();

        if (! $vestidos || ! $blusas) {
            $this->command->error('Subcategories not found. Run SubcategorySeeder first.');

            return;
        }

        $products = [
            [
                'sku' => 'DRESS-TEST-0001',
                'name' => 'Vestido Floral Midi Vermelho',
                'slug' => 'vestido-floral-midi-vermelho',
                'description' => 'Vestido midi com estampa floral em tons de vermelho. Tecido leve e fluido, perfeito para o clima angolano. Decote em V e manga curta.',
                'short_description' => 'Vestido midi floral vermelho, decote V, manga curta.',
                'subcategory_id' => $vestidos->id,
                'brand_id' => $zara?->id,
                'collection_id' => $verao?->id,
                'price_cost' => 8000.00,
                'price_sell' => 15000.00,
                'discount_percentage' => 0,
                'stock_min' => 3,
                'weight' => 250,
                'condition' => 'new',
                'is_active' => true,
                'is_featured' => true,
                'is_new' => true,
                'is_trending' => true,
                'meta_title' => 'Vestido Floral Midi Vermelho | Teu Estilo',
                'meta_description' => 'Vestido midi floral vermelho em Luanda. Tecido leve, decote V. Entrega em Angola.',
            ],
            [
                'sku' => 'DRESS-TEST-0002',
                'name' => 'Vestido Preto Elegante Longo',
                'slug' => 'vestido-preto-elegante-longo',
                'description' => 'Vestido longo preto elegante para eventos formais e festas. Tecido cetim com fenda lateral. O clássico "little black dress" versão angolana.',
                'short_description' => 'Vestido longo preto em cetim com fenda lateral.',
                'subcategory_id' => $vestidos->id,
                'brand_id' => $generico?->id,
                'collection_id' => null,
                'price_cost' => 12000.00,
                'price_sell' => 22000.00,
                'discount_percentage' => 10,
                'stock_min' => 2,
                'weight' => 350,
                'condition' => 'new',
                'is_active' => true,
                'is_featured' => true,
                'is_new' => true,
                'is_on_sale' => true,
                'meta_title' => 'Vestido Preto Elegante Longo | Teu Estilo',
                'meta_description' => 'Vestido longo preto elegante em cetim. Perfeito para festas e eventos formais em Luanda.',
            ],
            [
                'sku' => 'BLOUS-TEST-0001',
                'name' => 'Blusa Branca Cropped Algodão',
                'slug' => 'blusa-branca-cropped-algodao',
                'description' => 'Blusa cropped em algodão branco. Confortável e versátil para o dia a dia. Combina com tudo.',
                'short_description' => 'Blusa cropped branca em algodão, básica e versátil.',
                'subcategory_id' => $blusas->id,
                'brand_id' => $shein?->id,
                'collection_id' => $verao?->id,
                'price_cost' => 3000.00,
                'price_sell' => 6500.00,
                'discount_percentage' => 0,
                'stock_min' => 5,
                'weight' => 120,
                'condition' => 'new',
                'is_active' => true,
                'is_new' => true,
                'meta_title' => 'Blusa Branca Cropped | Teu Estilo',
                'meta_description' => 'Blusa cropped branca em algodão. Confortável e versátil para o dia a dia em Luanda.',
            ],
            [
                'sku' => 'BLAZR-TEST-0001',
                'name' => 'Blazer Oversized Bege',
                'slug' => 'blazer-oversized-bege',
                'description' => 'Blazer oversized em tom bege neutro. Corte moderno e descontraído. Ideal para looks de trabalho ou saídas casuais.',
                'short_description' => 'Blazer oversized bege, corte moderno.',
                'subcategory_id' => $blazers?->id ?? $vestidos->id,
                'brand_id' => $zara?->id,
                'collection_id' => null,
                'price_cost' => 10000.00,
                'price_sell' => 18500.00,
                'discount_percentage' => 0,
                'stock_min' => 2,
                'weight' => 400,
                'condition' => 'new',
                'is_active' => true,
                'is_featured' => true,
                'is_new' => true,
                'meta_title' => 'Blazer Oversized Bege | Teu Estilo',
                'meta_description' => 'Blazer oversized bege. Look profissional e moderno em Luanda.',
            ],
            [
                'sku' => 'SKIRT-TEST-0001',
                'name' => 'Saia Midi Plissada Preta',
                'slug' => 'saia-midi-plissada-preta',
                'description' => 'Saia midi plissada em tecido leve preto. Elegante e versátil. Elástico na cintura para conforto.',
                'short_description' => 'Saia midi plissada preta com elástico na cintura.',
                'subcategory_id' => $saias?->id ?? $vestidos->id,
                'brand_id' => $generico?->id,
                'collection_id' => null,
                'price_cost' => 5000.00,
                'price_sell' => 9500.00,
                'discount_percentage' => 15,
                'stock_min' => 3,
                'weight' => 180,
                'condition' => 'new',
                'is_active' => true,
                'is_on_sale' => true,
                'meta_title' => 'Saia Midi Plissada Preta | Teu Estilo',
                'meta_description' => 'Saia midi plissada preta. Elegante e confortável. Compre em Luanda.',
            ],
        ];

        foreach ($products as $data) {
            Product::query()->updateOrCreate(
                ['sku' => $data['sku']],
                array_merge([
                    'is_active' => true,
                    'is_featured' => false,
                    'is_new' => false,
                    'is_trending' => false,
                    'is_bestseller' => false,
                    'is_on_sale' => false,
                    'published_at' => now(),
                    'views_count' => 0,
                    'sales_count' => 0,
                ], $data),
            );
        }
    }
}
