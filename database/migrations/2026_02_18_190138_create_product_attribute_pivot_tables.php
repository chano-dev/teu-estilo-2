<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // =============================================
        // UNIVERSAL ATTRIBUTE PIVOTS
        // =============================================

        Schema::create('product_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('color_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'color_id']);
        });

        Schema::create('product_sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('size_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'size_id']);
        });

        Schema::create('product_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('material_id')->constrained()->cascadeOnDelete();
            $table->decimal('percentage', 5, 2)->nullable();
            $table->timestamps();
            $table->unique(['product_id', 'material_id']);
        });

        Schema::create('product_occasions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('occasion_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'occasion_id']);
        });

        Schema::create('product_styles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('style_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'style_id']);
        });

        Schema::create('product_patterns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('pattern_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'pattern_id']);
        });

        // =============================================
        // CLOTHING ATTRIBUTE PIVOTS
        // =============================================

        Schema::create('product_fits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('fit_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'fit_id']);
        });

        Schema::create('product_lengths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('length_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'length_id']);
        });

        Schema::create('product_necklines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('neckline_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'neckline_id']);
        });

        Schema::create('product_sleeves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('sleeve_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'sleeve_id']);
        });

        // =============================================
        // FOOTWEAR ATTRIBUTE PIVOTS
        // =============================================

        Schema::create('product_heel_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('heel_type_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'heel_type_id']);
        });

        Schema::create('product_closures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('closure_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'closure_id']);
        });

        // =============================================
        // DIFFERENTIAL ATTRIBUTE PIVOTS
        // =============================================

        Schema::create('product_body_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('body_type_id')->constrained()->cascadeOnDelete();
            $table->string('recommendation_level', 30)->default('suitable');
            $table->timestamps();
            $table->unique(['product_id', 'body_type_id']);
        });

        Schema::create('product_care_instructions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('care_instruction_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'care_instruction_id']);
        });

        Schema::create('product_certifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('certification_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'certification_id']);
        });

        // =============================================
        // WIG/HAIR ATTRIBUTE PIVOTS
        // =============================================

        Schema::create('product_hair_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('hair_type_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'hair_type_id']);
        });

        Schema::create('product_hair_textures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('hair_texture_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'hair_texture_id']);
        });

        Schema::create('product_cap_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('cap_type_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'cap_type_id']);
        });

        Schema::create('product_hair_densities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('hair_density_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['product_id', 'hair_density_id']);
        });

        Schema::create('product_hair_origins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('hair_origin_id')->constrained()->cascadeOnDelete();
            $table->decimal('percentage', 5, 2)->nullable();
            $table->timestamps();
            $table->unique(['product_id', 'hair_origin_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_hair_origins');
        Schema::dropIfExists('product_hair_densities');
        Schema::dropIfExists('product_cap_types');
        Schema::dropIfExists('product_hair_textures');
        Schema::dropIfExists('product_hair_types');
        Schema::dropIfExists('product_certifications');
        Schema::dropIfExists('product_care_instructions');
        Schema::dropIfExists('product_body_types');
        Schema::dropIfExists('product_closures');
        Schema::dropIfExists('product_heel_types');
        Schema::dropIfExists('product_sleeves');
        Schema::dropIfExists('product_necklines');
        Schema::dropIfExists('product_lengths');
        Schema::dropIfExists('product_fits');
        Schema::dropIfExists('product_patterns');
        Schema::dropIfExists('product_styles');
        Schema::dropIfExists('product_occasions');
        Schema::dropIfExists('product_materials');
        Schema::dropIfExists('product_sizes');
        Schema::dropIfExists('product_colors');
    }
};
