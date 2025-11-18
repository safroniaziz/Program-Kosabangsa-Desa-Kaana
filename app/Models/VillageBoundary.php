<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageBoundary extends Model
{
    use HasFactory;

    protected $fillable = [
        'village_name',
        'coordinates',
        'center_latitude',
        'center_longitude',
        'default_zoom',
        'fill_color',
        'fill_opacity',
        'line_color',
        'line_width',
        'is_active',
    ];

    protected $casts = [
        'coordinates' => 'array',
        'center_latitude' => 'decimal:8',
        'center_longitude' => 'decimal:8',
        'default_zoom' => 'integer',
        'fill_opacity' => 'decimal:2',
        'line_width' => 'integer',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
