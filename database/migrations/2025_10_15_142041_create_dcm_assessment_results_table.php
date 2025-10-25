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
        Schema::create('dcm_assessment_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->json('responses'); // Store all checkbox selections
            $table->json('category_scores'); // Store count per category
            $table->integer('dominant_category'); // Category with highest score
            $table->string('dominant_category_name');
            $table->integer('total_checked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dcm_assessment_results');
    }
};
