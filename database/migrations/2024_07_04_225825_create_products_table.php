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
            $table->foreignId('category_id')->cascadeOnDelete();
            $table->foreignId('supplier_id')->cascadeOnDelete();
            $table->string('price');
            $table->string('image');
            $table->string('promotion');
            $table->string('storage_capacity');
            $table->string('quantity');
            $table->string('sell_count')->default('0');
            $table->timestamps();
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
