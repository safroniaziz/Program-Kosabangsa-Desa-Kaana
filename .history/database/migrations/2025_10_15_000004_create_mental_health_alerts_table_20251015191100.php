<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mental_health_alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_assessment_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('alert_type', ['high_ptsd_risk', 'severe_depression', 'critical_anxiety', 'urgent_referral']);
            $table->enum('severity', ['moderate', 'high', 'critical']);
            $table->json('trigger_scores'); // {"pcl5": 45, "dass_depression": 28}
            $table->text('alert_message');
            $table->json('recommended_actions');
            $table->enum('status', ['active', 'acknowledged', 'resolved'])->default('active');
            $table->foreignId('acknowledged_by')->nullable()->constrained('users');
            $table->timestamp('acknowledged_at')->nullable();
            $table->timestamps();

            // Index for faster alert queries
            $table->index(['status', 'severity']);
            $table->index(['user_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mental_health_alerts');
    }
};