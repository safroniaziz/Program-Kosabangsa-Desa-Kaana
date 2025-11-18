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
        'answers',
        'total_score',
        'max_score',
        'risk_level',
        'results'
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
        'reviewed_at' => 'datetime',
        'requires_followup' => 'boolean',
        'recommendations' => 'array',
        'answers' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(UserAnswer::class);
    }

    public function userAnswers(): HasMany
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
    public function hasHighRisk(): bool
    {
        return in_array($this->overall_risk_level, ['high', 'critical']);
    }

    public function getProgressPercentageAttribute(): float
    {
        $totalQuestions = 0;
        $answeredQuestions = 0;

        if ($this->assessment_type === 'ptsd') {
            $totalQuestions = 30; // PTSD Diagnostic questions
        } elseif ($this->assessment_type === 'checklist_masalah') {
            $totalQuestions = 69; // DCM questions
        }

        $answeredQuestions = $this->answers()->count();

        return $totalQuestions > 0 ? ($answeredQuestions / $totalQuestions) * 100 : 0;
    }
}
