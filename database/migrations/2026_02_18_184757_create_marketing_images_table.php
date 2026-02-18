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
        Schema::create('marketing_images', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('file_path');
            $table->string('image_type', 20)->default('banner');  // banner, background, hero, promotional, category_cover
            $table->foreignId('segment_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->string('page', 50)->nullable();               // specific page: home, products, etc.
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('cta_text', 100)->nullable();           // button text
            $table->string('cta_link')->nullable();                // button URL
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index('is_active');
            $table->index(['start_date', 'end_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketing_images');
    }
};
