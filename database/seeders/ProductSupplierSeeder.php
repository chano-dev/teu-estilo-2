<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductSupplier;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class ProductSupplierSeeder extends Seeder
{
    public function run(): void
    {
        $teuEstilo = Supplier::where('sku_code', 'TEST')->first();
        $ckeuta = Supplier::where('sku_code', 'CKEU')->first();

        if (! $teuEstilo) {
            $this->command->error('❌ Supplier "Teu Estilo" (TEST) not found.');
            return;
        }

        $products = Product::all();

        if ($products->isEmpty()) {
            $this->command->error('❌ No products found. Run ProductSeeder first.');
            return;
        }

        foreach ($products as $product) {
            // Teu Estilo as preferred supplier for all products
            ProductSupplier::query()->updateOrCreate(
                ['product_id' => $product->id, 'supplier_id' => $teuEstilo->id],
                [
                    'cost_price' => $product->price_cost,
                    'commission_percentage' => 0,
                    'is_preferred' => true,
                    'lead_time_days' => 0,
                    'min_order_quantity' => 1,
                    'is_active' => true,
                ],
            );

            // Add Ckeuta as secondary supplier for first 2 products
            if ($ckeuta && $product->id <= 2) {
                ProductSupplier::query()->updateOrCreate(
                    ['product_id' => $product->id, 'supplier_id' => $ckeuta->id],
                    [
                        'cost_price' => $product->price_cost * 0.9,
                        'commission_percentage' => 20,
                        'is_preferred' => false,
                        'lead_time_days' => 3,
                        'min_order_quantity' => 1,
                        'is_active' => true,
                    ],
                );
            }
        }
    }
}