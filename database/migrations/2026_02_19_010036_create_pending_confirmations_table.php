<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pending_confirmations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_item_id')->constrained()->cascadeOnDelete();
            $table->foreignId('supplier_id')->constrained()->cascadeOnDelete();
            $table->string('status', 20)->default('pending');
            $table->timestamp('requested_at');
            $table->timestamp('responded_at')->nullable();
            $table->text('response_notes')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->index(['status', 'expires_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pending_confirmations');
    }
};
