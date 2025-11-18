<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistMasalahQuestion extends Model
{
    protected $fillable = [
        'question',
        'category',
        'category_name',
        'order_number'
    ];

    public static function getByCategory($category)
    {
        return self::where('category', $category)
                  ->orderBy('order_number')
                  ->get();
    }

    public static function getAllGroupedByCategory()
    {
        return self::orderBy('category')
                  ->orderBy('order_number')
                  ->get()
                  ->groupBy('category');
    }

    public static function getCategoryNames()
    {
        return [
            'Fisik' => 'Fisik',
            'Emosi' => 'Emosi',
            'Mental' => 'Mental',
            'Perilaku' => 'Perilaku',
            'Spiritual' => 'Spiritual'
        ];
    }
}
