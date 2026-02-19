<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('session_id', 100)->nullable();
            $table->string('source', 50)->nullable();
            $table->string('device_type', 20)->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamp('viewed_at');

            $table->index(['product_id', 'viewed_at']);
            $table->index('viewed_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_views');
    }
};
