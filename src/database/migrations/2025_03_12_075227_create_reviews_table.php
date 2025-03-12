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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('status_id')->default(2)->comment('公開ステータス');
            $table->unsignedInteger('product_id')->comment('商品ID');
            $table->unsignedInteger('user_id')->comment('会員ID');
            $table->unsignedInteger('reco_level')->comment('おすすめレベル');
            $table->string('title')->comment('タイトル');
            $table->longText('comment')->comment('本文');
            $table->timestamps();

            $table->index('product_id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
