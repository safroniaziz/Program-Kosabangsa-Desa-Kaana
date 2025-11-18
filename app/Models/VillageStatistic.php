<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'label',
        'value',
        'subtext',
        'icon',
        'order',
        'is_active',
    ];

    protected $casts = [
        'value' => 'integer',
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
