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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('session_id', 100)->nullable();         // For guest carts
            $table->string('cart_token', 64)->unique();             // Shareable token (WhatsApp)

            // === GUEST INFO ===
            $table->string('guest_name')->nullable();
            $table->string('guest_email')->nullable();
            $table->string('guest_phone', 30)->nullable();

            // === DELIVERY ADDRESS ===
            $table->foreignId('user_address_id')->nullable()->constrained()->nullOnDelete();
            $table->string('delivery_street')->nullable();
            $table->string('delivery_number', 20)->nullable();
            $table->string('delivery_neighborhood')->nullable();
            $table->string('delivery_city')->nullable();
            $table->string('delivery_province')->nullable();
            $table->string('delivery_landmark')->nullable();

            // === TOTALS ===
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->decimal('delivery_fee', 10, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);

            // === STATUS ===
            $table->string('status', 20)->default('active');       // active, abandoned, converted, expired
            $table->text('customer_notes')->nullable();
            $table->text('internal_notes')->nullable();

            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->index('session_id');
            $table->index('status');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
