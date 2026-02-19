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
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('variation_id')->nullable()->constrained('product_variations')->nullOnDelete();
            $table->boolean('notify_on_sale')->default(false);
            $table->boolean('notify_on_restock')->default(false);
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'product_id', 'variation_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
