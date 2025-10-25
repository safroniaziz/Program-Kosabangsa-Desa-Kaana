<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'total_questions',
        'time_limit_minutes',
        'instructions',
        'disclaimer_text',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function userAssessments()
    {
        return $this->hasMany(UserAssessment::class);
    }
}
