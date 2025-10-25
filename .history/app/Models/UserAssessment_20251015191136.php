<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'assessment_type',
        'started_at',
        'completed_at',
        'status',
        'consent_given',
        // PCL-5 Results
        'pcl5_total_score',
        'pcl5_cluster_b',
        'pcl5_cluster_c',
        'pcl5_cluster_d',
        'pcl5_cluster_e',
        'pcl5_severity',
        // DASS-21 Results
        'dass21_depression_score',
        'dass21_anxiety_score',
        'dass21_stress_score',
        'dass21_depression_level',
        'dass21_anxiety_level',
        'dass21_stress_level',
        // Overall
        'overall_risk_level',
        'interpretation_text',
        'recommendations',
        'requires_followup',
        'counselor_notes',
        'reviewed_by',
        'reviewed_at'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
        'reviewed_at' => 'datetime',
        'consent_given' => 'boolean',
        'requires_followup' => 'boolean',
        'recommendations' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(UserAnswer::class);
    }

    public function alerts(): HasMany
    {
        return $this->hasMany(MentalHealthAlert::class);
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    // Helper methods for risk assessment
    public function isPCL5Completed(): bool
    {
        return !is_null($this->pcl5_total_score);
    }

    public function isDASS21Completed(): bool
    {
        return !is_null($this->dass21_depression_score) && 
               !is_null($this->dass21_anxiety_score) && 
               !is_null($this->dass21_stress_score);
    }

    public function hasHighRisk(): bool
    {
        return in_array($this->overall_risk_level, ['high', 'critical']);
    }

    public function getProgressPercentageAttribute(): float
    {
        $totalQuestions = 0;
        $answeredQuestions = 0;

        if (in_array($this->assessment_type, ['pcl5', 'combined'])) {
            $totalQuestions += 20; // PCL-5 questions
        }
        
        if (in_array($this->assessment_type, ['dass21', 'combined'])) {
            $totalQuestions += 21; // DASS-21 questions
        }

        $answeredQuestions = $this->answers()->count();

        return $totalQuestions > 0 ? ($answeredQuestions / $totalQuestions) * 100 : 0;
    }
}