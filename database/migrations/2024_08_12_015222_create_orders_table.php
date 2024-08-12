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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->float('total', 8, 2);
            $table->string('payment_id');
            $table->enum('status', ['pending', 'failed', 'completed', 'executed'])->default('pending');
            $table->string('payment_provider');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('promotion_code_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
