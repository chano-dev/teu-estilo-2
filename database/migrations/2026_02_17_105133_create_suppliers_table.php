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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('company_name', 150);
            $table->string('slug', 150)->unique();
            $table->string('tax_id', 50)->nullable();        // NIF angolano
            $table->char('sku_code', 4)->unique();            // Código para sistema SKU
            $table->string('email')->nullable();
            $table->string('phone', 20);
            $table->string('whatsapp', 20)->nullable();
            $table->string('address')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('province', 50)->nullable();       // Província angolana
            $table->string('country', 100)->default('Angola');
            $table->string('payment_terms', 50)->nullable();  // cash, transfer, custom, etc.
            $table->string('bank_name', 100)->nullable();
            $table->string('bank_account', 50)->nullable();
            $table->boolean('is_consignment')->default(true);
            $table->decimal('commission_percentage', 5, 2)->nullable();
            $table->decimal('rating', 3, 2)->nullable();
            $table->boolean('is_active')->default(true);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
