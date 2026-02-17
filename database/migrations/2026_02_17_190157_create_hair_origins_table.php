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
        Schema::create('hair_origins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 100)->unique();
            $table->char('country_code', 2)->nullable();         // ISO 3166-1 alpha-2
            $table->text('description')->nullable();
            $table->text('characteristics')->nullable();
            $table->string('texture_profile', 50)->nullable();    // mainly straight, wavy, curly, varied
            $table->string('quality_tier', 20)->nullable();        // standard, premium, luxury
            $table->string('price_range', 20)->nullable();         // low, medium, high, premium
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
        Schema::dropIfExists('hair_origins');
    }
};
