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
            $table->unsignedInteger('user_id')->nullable()->default(null)->comment('会員ID');
            $table->string('cart_key')->unique()->nullable()->default(null)->comment('カートキー');
            $table->unsignedInteger('subtotal')->default(0)->comment('小計');
            $table->unsignedInteger('delivery_fee')->default(0)->comment('送料');
            $table->unsignedInteger('total')->default(0)->comment('請求合計');
            $table->timestamps();

            $table->index('user_id');
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
