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
            $table->enum('assessment_type', ['ptsd', 'checklist_masalah'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_assessments', function (Blueprint $table) {
            $table->enum('assessment_type', ['pcl5', 'dass21', 'combined', 'ptsd_diagnostic', 'checklist_masalah'])->change();
        });
    }
};
