<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_assessment_id',
        'question_number',
        'answer_value',
        'response_time_ms',
        'answered_at'
    ];

    protected $casts = [
        'answered_at' => 'datetime',
    ];

    public function userAssessment(): BelongsTo
    {
        return $this->belongsTo(UserAssessment::class);
    }

    public function user()
    {
        return $this->hasOneThrough(User::class, UserAssessment::class, 'id', 'id', 'user_assessment_id', 'user_id');
    }
}
