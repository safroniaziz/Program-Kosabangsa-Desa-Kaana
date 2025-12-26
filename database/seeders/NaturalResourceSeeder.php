<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NaturalResource;

class NaturalResourceSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Lahan Pertanian
            ['name' => 'Sawah Irigasi Kelompok A', 'category' => 'lahan', 'type' => 'Sawah Irigasi', 'area_size' => 25.5, 'unit' => 'Ha', 'condition' => 'baik', 'description' => 'Sawah irigasi dengan sistem pengairan dari sungai utama'],
            ['name' => 'Sawah Tadah Hujan', 'category' => 'lahan', 'type' => 'Sawah Tadah Hujan', 'area_size' => 15.0, 'unit' => 'Ha', 'condition' => 'sedang', 'description' => 'Sawah bergantung pada curah hujan'],
            ['name' => 'Ladang Palawija', 'category' => 'lahan', 'type' => 'Ladang', 'area_size' => 10.0, 'unit' => 'Ha', 'condition' => 'baik', 'description' => 'Lahan ladang untuk tanaman palawija'],
            ['name' => 'Kebun Kelapa', 'category' => 'lahan', 'type' => 'Perkebunan', 'area_size' => 8.5, 'unit' => 'Ha', 'condition' => 'baik', 'description' => 'Perkebunan kelapa warga'],
            
            // Sumber Air
            ['name' => 'Sungai Kaana', 'category' => 'air', 'type' => 'Sungai', 'area_size' => 5.2, 'unit' => 'km', 'condition' => 'baik', 'description' => 'Sungai utama desa untuk irigasi dan MCK'],
            ['name' => 'Mata Air Gunung', 'category' => 'air', 'type' => 'Mata Air', 'area_size' => 1, 'unit' => 'titik', 'condition' => 'baik', 'description' => 'Sumber air bersih utama desa'],
            ['name' => 'Sumur Bor Desa', 'category' => 'air', 'type' => 'Sumur Bor', 'area_size' => 3, 'unit' => 'unit', 'condition' => 'baik', 'description' => 'Sumur bor untuk cadangan air bersih'],
            
            // Hutan
            ['name' => 'Hutan Lindung Desa', 'category' => 'hutan', 'type' => 'Hutan Lindung', 'area_size' => 50.0, 'unit' => 'Ha', 'condition' => 'baik', 'description' => 'Hutan lindung sebagai penyangga ekosistem'],
            ['name' => 'Hutan Rakyat', 'category' => 'hutan', 'type' => 'Hutan Rakyat', 'area_size' => 20.0, 'unit' => 'Ha', 'condition' => 'sedang', 'description' => 'Hutan milik warga untuk kayu bakar'],
            
            // Mesin Pertanian
            ['name' => 'Traktor Roda 4', 'category' => 'mesin', 'type' => 'Traktor', 'area_size' => 2, 'unit' => 'unit', 'condition' => 'baik', 'description' => 'Traktor untuk mengolah sawah'],
            ['name' => 'Mesin Penggiling Padi', 'category' => 'mesin', 'type' => 'Penggiling', 'area_size' => 3, 'unit' => 'unit', 'condition' => 'baik', 'description' => 'Mesin penggilingan padi kelompok tani'],
            ['name' => 'Pompa Air Irigasi', 'category' => 'mesin', 'type' => 'Pompa Air', 'area_size' => 5, 'unit' => 'unit', 'condition' => 'sedang', 'description' => 'Pompa air untuk irigasi sawah'],
        ];

        foreach ($data as $item) {
            NaturalResource::create($item);
        }
    }
}
