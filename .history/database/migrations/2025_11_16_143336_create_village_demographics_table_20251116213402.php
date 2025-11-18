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
        Schema::create('village_demographics', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // 'gender_ratio', 'productive_age', 'education_quality', etc
            $table->string('title'); // 'Demografi Seimbang'
            $table->string('value')->nullable(); // '52.2% : 47.8%'
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('color')->nullable(); // 'sky', 'emerald', 'violet', etc
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_demographics');
    }
};
