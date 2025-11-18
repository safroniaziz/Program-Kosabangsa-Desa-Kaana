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
        Schema::create('chart_data', function (Blueprint $table) {
            $table->id();
            $table->string('chart_key')->index(); // 'population_chart', 'gender_distribution', etc
            $table->string('label'); // Label for the data point
            $table->decimal('value', 15, 2)->default(0);
            $table->string('color')->nullable(); // Hex color code
            $table->integer('order')->default(0);
            $table->json('metadata')->nullable(); // Additional data
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chart_data');
    }
};
