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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->json('price')->default(json_encode([
                'zen' => null,
                'paypal' => null,
                'stripe' => null,
                'transfer' => null,
                'paysafecard' => null,
                'direct_billing' => null,
            ]));
            $table->string('commands')->nullable();
            $table->string('image')->default('no-image.png');
            $table->boolean('active')->default(true);
            $table->decimal('display_price', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
