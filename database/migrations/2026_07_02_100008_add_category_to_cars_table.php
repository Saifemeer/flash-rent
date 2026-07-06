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
        Schema::table('cars', function (Blueprint $table) {
            // 🔥 Naya column add kar rahe hain jo 'price_per_day' ke baad banega
            $table->string('category')->default('sedan')->after('price_per_day');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            // Agar migration rollback karein toh yeh column delete ho jaye
            $table->dropColumn('category');
        });
    }
};