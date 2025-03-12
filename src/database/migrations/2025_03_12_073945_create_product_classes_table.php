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
        Schema::create('product_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('status_id')->default(2)->comment('公開ステータス');
            $table->unsignedInteger('product_id')->comment('商品ID');
            $table->unsignedInteger('class_category_id')->comment('分類ID');
            $table->unsignedInteger('set_count')->comment('セット');
            $table->unsignedInteger('price')->comment('販売価格');
            $table->timestamps();

            $table->index('product_id');
            $table->index('class_category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_classes');
    }
};
