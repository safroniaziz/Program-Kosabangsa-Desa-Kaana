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
        Schema::create('village_boundaries', function (Blueprint $table) {
            $table->id();
            $table->string('village_name'); // 'Desa Kaana'
            $table->json('coordinates'); // Array of [lng, lat] coordinates
            $table->decimal('center_latitude', 10, 8);
            $table->decimal('center_longitude', 11, 8);
            $table->integer('default_zoom')->default(13);
            $table->string('fill_color')->default('#2563eb');
            $table->decimal('fill_opacity', 3, 2)->default(0.15);
            $table->string('line_color')->default('#1d4ed8');
            $table->integer('line_width')->default(2);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_boundaries');
    }
};
