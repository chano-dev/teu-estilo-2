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
        Schema::create('hair_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 100)->unique();
            $table->text('description')->nullable();
            $table->text('characteristics')->nullable();
            $table->string('durability', 50)->nullable();       // e.g. "1-2 anos", "6-12 meses"
            $table->string('price_range', 30)->nullable();       // low, medium, high, premium
            $table->boolean('can_be_dyed')->default(false);
            $table->boolean('can_be_heat_styled')->default(false);
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hair_types');
    }
};
