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
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->id();
            $table->char('currency_from', 3);                     // USD, EUR, CNY
            $table->char('currency_to', 3)->default('AOA');        // Always AOA (Kwanza)
            $table->decimal('rate', 12, 4);                        // e.g. 920.0000
            $table->decimal('margin_percentage', 5, 2)->default(0); // Our markup %
            $table->boolean('is_active')->default(true);
            $table->timestamp('effective_from')->nullable();
            $table->timestamps();

            $table->unique(['currency_from', 'currency_to']);
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchange_rates');
    }
};
