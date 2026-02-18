<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Size;
use Illuminate\Database\Seeder;

class ProductVariationSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            $this->command->error('❌ No products found. Run ProductSeeder first.');
            return;
        }

        // Get common sizes and colors
        $sizeS = Size::where('name', 'S')->where('size_type', 'clothing')->first();
        $sizeM = Size::where('name', 'M')->where('size_type', 'clothing')->first();
        $sizeL = Size::where('name', 'L')->where('size_type', 'clothing')->first();
        $sizeXL = Size::where('name', 'XL')->where('size_type', 'clothing')->first();

        $vermelho = Color::where('slug', 'vermelho')->first();
        $preto = Color::where('slug', 'preto')->first();
        $branco = Color::where('slug', 'branco')->first();
        $bege = Color::where('slug', 'bege')->first();

        if (! $sizeM || ! $vermelho) {
            $this->command->error('❌ Sizes or colors not found. Run SizeSeeder and ColorSeeder first.');
            return;
        }

        // Product 1: Vestido Floral Midi Vermelho — red in S, M, L
        $p1 = $products->where('sku', 'DRESS-TEST-0001')->first();
        if ($p1 && $vermelho) {
            foreach ([$sizeS, $sizeM, $sizeL] as $size) {
                if (! $size) continue;
                ProductVariation::query()->updateOrCreate(
                    ['product_id' => $p1->id, 'color_id' => $vermelho->id, 'size_id' => $size->id],
                    [
                        'sku_variation' => "DRESS-TEST-0001-VRM-{$size->name}",
                        'price_adjustment' => 0,
                        'stock_quantity' => rand(3, 8),
                        'stock_reserved' => 0,
                        'is_active' => true,
                    ],
                );
            }
        }

        // Product 2: Vestido Preto Elegante — black in S, M, L, XL
        $p2 = $products->where('sku', 'DRESS-TEST-0002')->first();
        if ($p2 && $preto) {
            foreach ([$sizeS, $sizeM, $sizeL, $sizeXL] as $size) {
                if (! $size) continue;
                $adj = ($size->name === 'XL') ? 500 : 0;
                ProductVariation::query()->updateOrCreate(
                    ['product_id' => $p2->id, 'color_id' => $preto->id, 'size_id' => $size->id],
                    [
                        'sku_variation' => "DRESS-TEST-0002-PRT-{$size->name}",
                        'price_adjustment' => $adj,
                        'stock_quantity' => rand(2, 6),
                        'stock_reserved' => 0,
                        'is_active' => true,
                    ],
                );
            }
        }

        // Product 3: Blusa Branca — white in S, M, L
        $p3 = $products->where('sku', 'BLOUS-TEST-0001')->first();
        if ($p3 && $branco) {
            foreach ([$sizeS, $sizeM, $sizeL] as $size) {
                if (! $size) continue;
                ProductVariation::query()->updateOrCreate(
                    ['product_id' => $p3->id, 'color_id' => $branco->id, 'size_id' => $size->id],
                    [
                        'sku_variation' => "BLOUS-TEST-0001-BRC-{$size->name}",
                        'price_adjustment' => 0,
                        'stock_quantity' => rand(5, 12),
                        'stock_reserved' => 0,
                        'is_active' => true,
                    ],
                );
            }
        }

        // Product 4: Blazer Bege — beige in M, L
        $p4 = $products->where('sku', 'BLAZR-TEST-0001')->first();
        if ($p4 && $bege) {
            foreach ([$sizeM, $sizeL] as $size) {
                if (! $size) continue;
                ProductVariation::query()->updateOrCreate(
                    ['product_id' => $p4->id, 'color_id' => $bege->id, 'size_id' => $size->id],
                    [
                        'sku_variation' => "BLAZR-TEST-0001-BGE-{$size->name}",
                        'price_adjustment' => 0,
                        'stock_quantity' => rand(2, 5),
                        'stock_reserved' => 0,
                        'is_active' => true,
                    ],
                );
            }
        }

        // Product 5: Saia Preta — black in S, M, L
        $p5 = $products->where('sku', 'SKIRT-TEST-0001')->first();
        if ($p5 && $preto) {
            foreach ([$sizeS, $sizeM, $sizeL] as $size) {
                if (! $size) continue;
                ProductVariation::query()->updateOrCreate(
                    ['product_id' => $p5->id, 'color_id' => $preto->id, 'size_id' => $size->id],
                    [
                        'sku_variation' => "SKIRT-TEST-0001-PRT-{$size->name}",
                        'price_adjustment' => 0,
                        'stock_quantity' => rand(3, 7),
                        'stock_reserved' => 0,
                        'is_active' => true,
                    ],
                );
            }
        }
    }
}