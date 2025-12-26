<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('infrastructures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('category', ['jalan', 'jembatan', 'listrik', 'air', 'telekomunikasi', 'fasilitas_umum', 'lainnya'])->default('lainnya');
            $table->string('type')->nullable();
            $table->enum('condition', ['baik', 'sedang', 'rusak', 'tidak_ada'])->default('baik');
            $table->decimal('length', 10, 2)->nullable(); // Panjang (km/m)
            $table->decimal('capacity', 10, 2)->nullable(); // Kapasitas
            $table->string('unit')->nullable();
            $table->text('description')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->integer('coverage_percentage')->nullable(); // Persentase cakupan
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('infrastructures');
    }
};
