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
        Schema::table('user_assessments', function (Blueprint $table) {
            // Field berikut tidak lagi digunakan — dikosongkan agar tidak ditambahkan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_assessments', function (Blueprint $table) {
            // Tidak ada perubahan yang perlu di-rollback karena tidak menambah kolom apapun
        });
    }
};
