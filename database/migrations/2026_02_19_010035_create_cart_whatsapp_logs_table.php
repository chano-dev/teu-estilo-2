<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cart_whatsapp_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained()->cascadeOnDelete();
            $table->string('phone_number', 30);
            $table->text('message_content');
            $table->string('status', 20)->default('sent');
            $table->timestamp('sent_at');
            $table->timestamps();

            $table->index('cart_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart_whatsapp_logs');
    }
};
