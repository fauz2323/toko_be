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
        Schema::create('history_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('user_apps')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('ip_address', 45)->nullable();
            $table->string('uuid')->unique();
            $table->text('description')->nullable();
            $table->bigInteger('price')->default(0);
            $table->bigInteger('totalPrice')->default(0);
            $table->bigInteger('qty')->default(0);
            $table->string('status')->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_users');
    }
};
