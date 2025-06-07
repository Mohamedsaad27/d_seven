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
        Schema::table('order_items', function (Blueprint $table) {
            // Drop foreign key constraint first
            $table->dropForeign(['size_id']);
        });

        Schema::table('order_items', function (Blueprint $table) {
            // Make size_id nullable
            $table->bigInteger('size_id')->unsigned()->nullable()->change();

            // Recreate foreign key constraint
            $table->foreign('size_id')->references('id')->on('product_sizes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['size_id']);
        });

        Schema::table('order_items', function (Blueprint $table) {
            // Make size_id not nullable
            $table->bigInteger('size_id')->unsigned()->nullable(false)->change();

            // Recreate original foreign key constraint
            $table->foreign('size_id')->references('id')->on('product_sizes');
        });
    }
};
