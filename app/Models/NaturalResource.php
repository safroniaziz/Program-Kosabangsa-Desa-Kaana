<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NaturalResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'type',
        'area_size',
        'unit',
        'description',
        'latitude',
        'longitude',
        'condition',
        'is_active',
    ];

    protected $casts = [
        'area_size' => 'decimal:2',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public static function getCategoryLabels()
    {
        return [
            'lahan' => 'Lahan Pertanian',
            'air' => 'Sumber Air',
            'mineral' => 'Potensi Mineral',
            'mesin' => 'Mesin Pertanian',
            'hutan' => 'Hutan',
            'lainnya' => 'Lainnya',
        ];
    }

    public function getCategoryLabelAttribute()
    {
        return self::getCategoryLabels()[$this->category] ?? $this->category;
    }
}
