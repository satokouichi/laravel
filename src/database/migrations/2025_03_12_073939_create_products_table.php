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
            $table->unsignedInteger('status_id')->default(2)->comment('公開ステータス');
            $table->string('name')->comment('商品名');
            $table->unsignedInteger('class_category_id')->comment('デフォルト分類ID');
            $table->longText('comment1')->nullable()->default(null)->comment('商品説明');
            $table->longText('comment2')->nullable()->default(null)->comment('注意事項');
            $table->longText('comment3')->nullable()->default(null)->comment('その他');
            $table->timestamps();

            $table->index('class_category_id');
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
