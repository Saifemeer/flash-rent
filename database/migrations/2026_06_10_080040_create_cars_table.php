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
      Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->string('name');          // Gaari ka naam (e.g., Civic, Corolla)
        $table->string('brand');         // Honda, Toyota, etc.
        $table->string('model_year');    // 2024, 2025, etc.
        $table->integer('price_per_day');// Ek din ka rent (Rs.)
        $table->string('image')->nullable(); // Gaari ki photo ka rasta
        $table->boolean('is_available')->default(true); // Gaari available hai ya rent par chali gayi
        $table->timestamps();            // created_at aur updated_at khud ban jayega
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
