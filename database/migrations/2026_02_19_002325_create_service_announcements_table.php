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
        Schema::create('service_announcements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('message')->nullable();
            $table->string('status', 20)->default('scheduled');    // scheduled, open, closed, paused
            $table->timestamp('opens_at')->nullable();              // When it opens
            $table->timestamp('closes_at')->nullable();             // When it closes
            $table->timestamp('next_opening_at')->nullable();       // When next one opens (for countdown)

            // === INTERNAL FIELDS (not exposed to public) ===
            $table->decimal('internal_limit', 12, 2)->nullable();   // e.g. 250000.00 Kz monthly bank limit
            $table->decimal('internal_used', 12, 2)->default(0);    // How much has been used
            $table->text('internal_notes')->nullable();              // Admin internal notes

            $table->boolean('show_countdown')->default(false);      // Show countdown on frontend?
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['service_id', 'status']);
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_announcements');
    }
};
