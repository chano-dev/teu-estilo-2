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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('variation_id')->nullable()->constrained('product_variations')->nullOnDelete();
            $table->unsignedSmallInteger('quantity')->default(1);
            $table->decimal('unit_price', 10, 2);
            $table->decimal('discount_percentage', 5, 2)->default(0);
            $table->decimal('subtotal', 12, 2);
            $table->boolean('needs_confirmation')->default(false);  // For consignment items
            $table->timestamp('confirmed_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index('cart_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
