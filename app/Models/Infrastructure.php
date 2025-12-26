<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category', 'type', 'condition', 'length', 'capacity',
        'unit', 'description', 'latitude', 'longitude', 'coverage_percentage', 'is_active',
    ];

    protected $casts = [
        'length' => 'decimal:2',
        'capacity' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public static function getCategoryLabels()
    {
        return [
            'jalan' => 'Jalan',
            'jembatan' => 'Jembatan',
            'listrik' => 'Jaringan Listrik',
            'air' => 'Air Bersih',
            'telekomunikasi' => 'Telekomunikasi',
            'fasilitas_umum' => 'Fasilitas Umum',
            'lainnya' => 'Lainnya',
        ];
    }

    public static function getConditionLabels()
    {
        return [
            'baik' => 'Baik',
            'sedang' => 'Sedang',
            'rusak' => 'Rusak',
            'tidak_ada' => 'Tidak Ada',
        ];
    }

    public function getCategoryLabelAttribute()
    {
        return self::getCategoryLabels()[$this->category] ?? $this->category;
    }

    public function getConditionLabelAttribute()
    {
        return self::getConditionLabels()[$this->condition] ?? $this->condition;
    }
}
