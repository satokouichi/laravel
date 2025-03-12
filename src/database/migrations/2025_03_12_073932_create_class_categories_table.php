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
        Schema::create('class_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('class_name_id')->comment('規格ID');
            $table->string('name')->comment('分類名');
            $table->string('unit')->nullable()->default(null)->comment('単位');
            $table->unsignedInteger('rank')->comment('並び順');
            $table->timestamps();

            $table->index('class_name_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_categories');
    }
};
