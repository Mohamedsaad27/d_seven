<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->timestamps();
        });
        Schema::table('product_colors', function (Blueprint $table) {
            $table->unsignedBigInteger('color_id')->nullable();
            $table
                ->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');
        });
        Schema::table('inventory', function (Blueprint $table) {
            $table->unsignedBigInteger('color_id')->nullable()->after('product_id');
            $table->foreign('color_id')->references('id')->on('product_colors')->onDelete('cascade');
        });
        Schema::table('cart_items', function (Blueprint $table) {
            $table->unsignedBigInteger('color_id')->nullable()->after('product_id');
            $table->foreign('color_id')->references('id')->on('product_colors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};
