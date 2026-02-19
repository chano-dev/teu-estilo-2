<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Ordem importa! Tabelas com FK devem vir depois das suas dependências.
     */
    public function run(): void
    {
        $this->call([

            // ── Batch 1: Fundação (sem FK) ──────────────────
            SegmentSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            CollectionSeeder::class,
            SupplierSeeder::class,

            // ── Batch 2: Fundação com FK ─────────────────────
            SubcategorySeeder::class,

            // ── Batch 3: Atributos (sem FK) ──────────────────
            // Um seeder grande ou vários pequenos — tu decides
            // AttributeSeeder::class,
            // Ou individualmente:
            ColorSeeder::class,
            SizeSeeder::class,
            MaterialSeeder::class,
            OccasionSeeder::class,
            StyleSeeder::class,
            PatternSeeder::class,
            FitSeeder::class,
            LengthSeeder::class,
            NecklineSeeder::class,
            SleeveSeeder::class,
            HeelTypeSeeder::class,
            ClosureSeeder::class,
            BodyTypeSeeder::class,
            CareInstructionSeeder::class,
            CertificationSeeder::class,
            HairTypeSeeder::class,
            HairTextureSeeder::class,
            CapTypeSeeder::class,
            HairDensitySeeder::class,
            HairOriginSeeder::class,

            // ── Batch 5: Core (depende de subcategories, brands, collections) ──
            ProductSeeder::class,
            ServiceSeeder::class,

            // Batch 6 - Relationship Tables
            ProductSupplierSeeder::class,
            ProductVariationSeeder::class,
            // ProductImage, ProductService, ServiceImage, MarketingImage — no seeders (admin panel)

            // ── Batch 7: Pivot Tables + Product Attribute Relationships ──
            ProductAttributeSeeder::class,

            // Batch 8 - Cart System & Services
            ExchangeRateSeeder::class,
            // ServiceAnnouncement, ServiceInquiry, Cart, CartItem, Wishlist,
            // ProductView, CartWhatsappLog, PendingConfirmation — no seeders (runtime data)

        ]);
    }
}
