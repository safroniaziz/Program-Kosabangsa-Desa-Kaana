<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('assessment_type', ['pcl5', 'dass21', 'combined', 'ptsd_diagnostic', 'checklist_masalah']);
            $table->timestamp('started_at');
            $table->timestamp('completed_at')->nullable();
            $table->enum('status', ['in_progress', 'completed', 'abandoned'])->default('in_progress');

            // Results storage as JSON
            $table->json('results')->nullable();

            // PCL-5 Results
            $table->integer('pcl5_total_score')->nullable(); // 0-80
            $table->integer('pcl5_cluster_b')->nullable(); // Re-experiencing (0-20)
            $table->integer('pcl5_cluster_c')->nullable(); // Avoidance (0-8)
            $table->integer('pcl5_cluster_d')->nullable(); // Negative alterations (0-28)
            $table->integer('pcl5_cluster_e')->nullable(); // Arousal/reactivity (0-24)
            $table->enum('pcl5_severity', ['normal', 'moderate', 'probable', 'severe'])->nullable();

            // DASS-21 Results
            $table->integer('dass21_depression_score')->nullable(); // 0-42
            $table->integer('dass21_anxiety_score')->nullable(); // 0-42
            $table->integer('dass21_stress_score')->nullable(); // 0-42
            $table->enum('dass21_depression_level', ['normal', 'mild', 'moderate', 'severe', 'extremely_severe'])->nullable();
            $table->enum('dass21_anxiety_level', ['normal', 'mild', 'moderate', 'severe', 'extremely_severe'])->nullable();
            $table->enum('dass21_stress_level', ['normal', 'mild', 'moderate', 'severe', 'extremely_severe'])->nullable();

            // Overall Assessment
            $table->enum('overall_risk_level', ['low', 'moderate', 'high', 'critical'])->nullable();
            $table->text('interpretation_text')->nullable();
            $table->json('recommendations')->nullable();
            $table->boolean('requires_followup')->default(false);
            $table->text('counselor_notes')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users');
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_assessments');
    }
};
