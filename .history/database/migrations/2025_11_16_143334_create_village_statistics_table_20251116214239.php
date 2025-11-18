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
        Schema::create('village_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // 'total_population', 'total_households', 'active_umkm', 'total_dusun'
            $table->string('label'); // 'Jumlah Penduduk', 'Kepala Keluarga', etc
            $table->bigInteger('value')->default(0);
            $table->string('subtext')->nullable(); // 'Analitik demografi terverifikasi 2023'
            $table->string('icon')->nullable(); // SVG path or icon name
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
        Schema::dropIfExists('village_statistics');
    }
};
