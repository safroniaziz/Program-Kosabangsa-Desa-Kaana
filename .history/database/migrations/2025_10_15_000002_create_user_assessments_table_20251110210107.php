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
            $table->enum('assessment_type', ['ptsd', 'checklist_masalah']);
            $table->timestamp('started_at');
            $table->timestamp('completed_at')->nullable();
            $table->enum('status', ['in_progress', 'completed', 'abandoned'])->default('in_progress');

            // Results storage as JSON
            $table->json('results')->nullable();

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
