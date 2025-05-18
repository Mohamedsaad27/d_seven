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
        // Create the sizes table
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('size');
            $table->timestamps();
        });

        Schema::table('product_sizes', function (Blueprint $table) {
            $table->unsignedBigInteger('size_id')->nullable()->after('product_id');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
        });

        Schema::table('inventory', function (Blueprint $table) {
            $table->unsignedBigInteger('size_id')->nullable()->after('product_id');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->unique(['product_id', 'color_id', 'size_id']);
        });
        Schema::table('cart_items', function (Blueprint $table) {
            $table->unsignedBigInteger('size_id')->nullable()->after('product_id');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop foreign key and column first
        Schema::table('product_sizes', function (Blueprint $table) {
            $table->dropForeign(['size_id']);
            $table->dropColumn('size_id');
        });

        // Drop the sizes table
        Schema::dropIfExists('sizes');
    }
};
