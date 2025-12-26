<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EconomicActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category', 'type', 'owner_name', 'employee_count',
        'annual_revenue', 'description', 'address', 'latitude', 'longitude', 'is_active',
    ];

    protected $casts = [
        'annual_revenue' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public static function getCategoryLabels()
    {
        return [
            'umkm' => 'UMKM',
            'pertanian' => 'Pertanian',
            'perikanan' => 'Perikanan',
            'perdagangan' => 'Perdagangan',
            'pariwisata' => 'Pariwisata',
            'keuangan' => 'Akses Keuangan',
            'lainnya' => 'Lainnya',
        ];
    }

    public function getCategoryLabelAttribute()
    {
        return self::getCategoryLabels()[$this->category] ?? $this->category;
    }
}
