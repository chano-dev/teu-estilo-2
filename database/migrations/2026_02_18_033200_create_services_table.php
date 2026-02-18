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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            // === IDENTITY ===
            $table->string('name');
            $table->string('slug')->unique();

            // === DESCRIPTION ===
            $table->text('description')->nullable();
            $table->string('short_description')->nullable();

            // === CLASSIFICATION ===
            $table->foreignId('subcategory_id')->constrained()->restrictOnDelete();
            $table->foreignId('segment_id')->nullable()->constrained()->nullOnDelete();

            // === PRICING (in Kwanza AOA) ===
            $table->decimal('base_price', 10, 2);
            $table->string('price_type', 20)->default('fixed');

            // === REQUIREMENTS ===
            $table->boolean('requires_measurements')->default(false);
            $table->boolean('requires_deposit')->default(false);
            $table->decimal('deposit_percentage', 5, 2)->default(0);

            // === DURATION ===
            $table->unsignedInteger('duration_minutes')->nullable();

            // === SCHEDULING ===
            $table->json('available_days')->nullable();
            $table->json('available_hours')->nullable();
            $table->unsignedSmallInteger('max_advance_booking_days')->nullable();

            // === MEDIA ===
            $table->string('image_path')->nullable();

            // === FLAGS ===
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->unsignedSmallInteger('sort_order')->default(0);

            // === SEO ===
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // === TIMESTAMPS ===
            $table->timestamps();
            $table->softDeletes();

            // === INDEXES ===
            $table->index('is_active');
            $table->index('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
