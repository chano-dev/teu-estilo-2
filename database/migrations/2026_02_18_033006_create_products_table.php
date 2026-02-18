<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // === IDENTITY ===
            $table->string('sku', 60)->unique();
            $table->string('barcode', 50)->nullable()->unique();
            $table->string('name');
            $table->string('slug')->unique();

            // === DESCRIPTION ===
            $table->text('description')->nullable();
            $table->string('short_description')->nullable();

            // === CLASSIFICATION ===
            $table->foreignId('subcategory_id')->constrained()->restrictOnDelete();
            $table->foreignId('brand_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('collection_id')->nullable()->constrained()->nullOnDelete();

            // === PRICING (in Kwanza AOA) ===
            $table->decimal('price_cost', 10, 2)->default(0);
            $table->decimal('price_sell', 10, 2);
            $table->decimal('discount_percentage', 5, 2)->default(0);

            // === STOCK ===
            $table->unsignedInteger('stock_min')->default(0);

            // === PHYSICAL ===
            $table->unsignedInteger('weight')->nullable();
            $table->string('condition', 20)->default('new');

            // === FLAGS ===
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_new')->default(true);
            $table->boolean('is_trending')->default(false);
            $table->boolean('is_bestseller')->default(false);
            $table->boolean('is_on_sale')->default(false);

            // === SCHEDULING ===
            $table->timestamp('published_at')->nullable();
            $table->timestamp('publish_start')->nullable();
            $table->timestamp('publish_end')->nullable();

            // === SEO ===
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // === ANALYTICS ===
            $table->unsignedInteger('views_count')->default(0);
            $table->unsignedInteger('sales_count')->default(0);

            // === TIMESTAMPS ===
            $table->timestamps();
            $table->softDeletes();

            // === INDEXES ===
            $table->index('condition');
            $table->index('is_active');
            $table->index('is_featured');
            $table->index('is_on_sale');
            $table->index(['subcategory_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
