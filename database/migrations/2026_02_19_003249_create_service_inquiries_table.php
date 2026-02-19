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
        Schema::create('service_inquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // === CONTACT INFO ===
            $table->string('name');
            $table->string('phone', 30);
            $table->string('email')->nullable();

            // === INQUIRY DETAILS ===
            $table->text('message');
            $table->string('image_path')->nullable();              // Photo attachment (Shein cart, wig photo, garment)
            $table->string('image_path_2')->nullable();            // Optional second photo
            $table->decimal('budget', 10, 2)->nullable();          // Client's budget estimate

            // === SHEIN-SPECIFIC (nullable for other services) ===
            $table->text('shein_links')->nullable();                // Shein product links (text block)
            $table->decimal('shein_total_usd', 10, 2)->nullable(); // Total in USD from Shein cart
            $table->decimal('estimated_total_aoa', 12, 2)->nullable(); // Calculated total in Kwanza

            // === STATUS ===
            $table->string('status', 20)->default('pending');      // pending, contacted, in_progress, completed, cancelled
            $table->text('admin_notes')->nullable();
            $table->boolean('whatsapp_sent')->default(false);
            $table->timestamp('contacted_at')->nullable();
            $table->timestamp('completed_at')->nullable();

            $table->timestamps();

            $table->index(['service_id', 'status']);
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_inquiries');
    }
};
