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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id')->comment('注文ID');
            $table->unsignedInteger('product_class_id')->comment('商品規格ID');
            $table->unsignedInteger('price')->default(0)->comment('価格');
            $table->unsignedInteger('quantity')->default(1)->comment('数量');
            $table->timestamps();

            $table->index('order_id');
            $table->index('product_class_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
