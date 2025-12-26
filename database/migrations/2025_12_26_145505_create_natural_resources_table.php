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
        Schema::create('natural_resources', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('category', ['lahan', 'air', 'mineral', 'mesin', 'hutan', 'lainnya'])->default('lainnya');
            $table->string('type')->nullable(); // Jenis spesifik (sawah, ladang, sungai, dll)
            $table->decimal('area_size', 12, 2)->nullable(); // Luas/ukuran
            $table->string('unit')->nullable(); // Satuan (Ha, m², liter, dll)
            $table->text('description')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('condition')->nullable(); // Kondisi (baik, sedang, rusak)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('natural_resources');
    }
};
