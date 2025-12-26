<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Infrastructure;

class InfrastructureSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // Jalan
            ['name' => 'Jalan Desa Utama', 'category' => 'jalan', 'type' => 'Aspal', 'condition' => 'baik', 'coverage_percentage' => 90, 'description' => 'Jalan utama menghubungkan desa dengan kecamatan'],
            ['name' => 'Jalan Lingkungan RT 01-05', 'category' => 'jalan', 'type' => 'Beton', 'condition' => 'baik', 'coverage_percentage' => 85, 'description' => 'Jalan lingkungan warga'],
            ['name' => 'Jalan Usaha Tani', 'category' => 'jalan', 'type' => 'Tanah', 'condition' => 'sedang', 'coverage_percentage' => 60, 'description' => 'Jalan menuju area pertanian'],
            
            // Jembatan
            ['name' => 'Jembatan Sungai Kaana', 'category' => 'jembatan', 'type' => 'Beton', 'condition' => 'baik', 'description' => 'Jembatan penghubung antar dusun'],
            ['name' => 'Jembatan Kecil RT 03', 'category' => 'jembatan', 'type' => 'Kayu', 'condition' => 'rusak', 'description' => 'Jembatan kecil perlu perbaikan'],
            
            // Listrik
            ['name' => 'Jaringan PLN Desa', 'category' => 'listrik', 'type' => 'PLN', 'condition' => 'baik', 'coverage_percentage' => 95, 'description' => 'Jaringan listrik PLN ke seluruh desa'],
            ['name' => 'PLTS Komunal', 'category' => 'listrik', 'type' => 'PLTS', 'condition' => 'baik', 'coverage_percentage' => 10, 'description' => 'Panel surya untuk area terpencil'],
            
            // Air Bersih
            ['name' => 'PDAM Desa', 'category' => 'air', 'type' => 'PDAM', 'condition' => 'baik', 'coverage_percentage' => 70, 'description' => 'Jaringan air bersih PDAM'],
            ['name' => 'Sumur Bor Komunal', 'category' => 'air', 'type' => 'Sumur Bor', 'condition' => 'baik', 'coverage_percentage' => 20, 'description' => 'Sumur bor untuk warga yang belum terjangkau PDAM'],
            
            // Telekomunikasi
            ['name' => 'Tower BTS Telkomsel', 'category' => 'telekomunikasi', 'type' => 'BTS', 'condition' => 'baik', 'coverage_percentage' => 85, 'description' => 'Tower sinyal HP'],
            ['name' => 'Internet Desa', 'category' => 'telekomunikasi', 'type' => 'Fiber Optik', 'condition' => 'baik', 'coverage_percentage' => 50, 'description' => 'Jaringan internet fiber optik'],
            
            // Fasilitas Umum
            ['name' => 'Balai Desa', 'category' => 'fasilitas_umum', 'type' => 'Gedung', 'condition' => 'baik', 'description' => 'Kantor pemerintahan desa'],
            ['name' => 'Puskesmas Pembantu', 'category' => 'fasilitas_umum', 'type' => 'Kesehatan', 'condition' => 'baik', 'description' => 'Fasilitas kesehatan desa'],
            ['name' => 'Masjid Jami', 'category' => 'fasilitas_umum', 'type' => 'Ibadah', 'condition' => 'baik', 'description' => 'Masjid utama desa'],
            ['name' => 'Pasar Desa', 'category' => 'fasilitas_umum', 'type' => 'Pasar', 'condition' => 'sedang', 'description' => 'Pasar tradisional desa'],
        ];

        foreach ($data as $item) {
            Infrastructure::create($item);
        }
    }
}
