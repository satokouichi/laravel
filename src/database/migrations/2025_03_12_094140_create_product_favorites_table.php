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
        Schema::create('product_favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->comment('会員ID');
            $table->unsignedInteger('product_class_id')->comment('商品規格ID');
            $table->timestamps();

            $table->index('user_id');
            $table->index('product_class_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_favorites');
    }
};
