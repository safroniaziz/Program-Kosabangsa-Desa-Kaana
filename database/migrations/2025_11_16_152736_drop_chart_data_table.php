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
        Schema::dropIfExists('chart_data');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('chart_data', function (Blueprint $table) {
            $table->id();
            $table->string('chart_key')->index();
            $table->string('label');
            $table->decimal('value', 15, 2)->default(0);
            $table->string('color')->nullable();
            $table->integer('order')->default(0);
            $table->json('metadata')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
};
