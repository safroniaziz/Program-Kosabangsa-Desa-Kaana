<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MentalHealthAlert extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_assessment_id',
        'user_id',
        'alert_type',
        'severity',
        'trigger_scores',
        'alert_message',
        'recommended_actions',
        'status',
        'acknowledged_by',
        'acknowledged_at'
    ];

    protected $casts = [
        'trigger_scores' => 'array',
        'recommended_actions' => 'array',
        'acknowledged_at' => 'datetime'
    ];

    public function userAssessment(): BelongsTo
    {
        return $this->belongsTo(UserAssessment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function acknowledgedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'acknowledged_by');
    }

    public function isCritical(): bool
    {
        return $this->severity === 'critical';
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCritical($query)
    {
        return $query->where('severity', 'critical');
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
