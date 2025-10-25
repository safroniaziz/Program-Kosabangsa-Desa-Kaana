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
            1 => 'Fisik',
            2 => 'Emosi', 
            3 => 'Mental',
            4 => 'Perilaku',
            5 => 'Spiritual'
        ];
    }
}
