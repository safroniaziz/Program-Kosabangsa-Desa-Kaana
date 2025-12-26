<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EconomicActivity;

class EconomicActivitySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // UMKM
            ['name' => 'Warung Makan Bu Siti', 'category' => 'umkm', 'type' => 'Kuliner', 'owner_name' => 'Siti Aminah', 'employee_count' => 2, 'annual_revenue' => 60000000, 'address' => 'RT 01', 'description' => 'Warung makan tradisional'],
            ['name' => 'Toko Kelontong Pak Ahmad', 'category' => 'umkm', 'type' => 'Retail', 'owner_name' => 'Ahmad', 'employee_count' => 1, 'annual_revenue' => 120000000, 'address' => 'RT 02', 'description' => 'Toko kelontong lengkap'],
            ['name' => 'Bengkel Motor Jaya', 'category' => 'umkm', 'type' => 'Jasa', 'owner_name' => 'Budi Santoso', 'employee_count' => 3, 'annual_revenue' => 80000000, 'address' => 'RT 03', 'description' => 'Bengkel motor dan service'],
            ['name' => 'Kerajinan Anyaman Bambu', 'category' => 'umkm', 'type' => 'Kerajinan', 'owner_name' => 'Kelompok Ibu PKK', 'employee_count' => 10, 'annual_revenue' => 50000000, 'address' => 'RT 04', 'description' => 'Kerajinan anyaman bambu khas desa'],
            ['name' => 'Konveksi Berkah', 'category' => 'umkm', 'type' => 'Produksi', 'owner_name' => 'Hj. Fatimah', 'employee_count' => 5, 'annual_revenue' => 150000000, 'address' => 'RT 01', 'description' => 'Konveksi pakaian'],
            
            // Pertanian
            ['name' => 'Kelompok Tani Makmur', 'category' => 'pertanian', 'type' => 'Padi', 'owner_name' => 'Pak Karjo', 'employee_count' => 25, 'annual_revenue' => 500000000, 'description' => 'Kelompok tani padi sawah'],
            ['name' => 'Kebun Sayur Organik', 'category' => 'pertanian', 'type' => 'Sayuran', 'owner_name' => 'Pak Darto', 'employee_count' => 8, 'annual_revenue' => 180000000, 'description' => 'Pertanian sayuran organik'],
            ['name' => 'Perkebunan Kelapa', 'category' => 'pertanian', 'type' => 'Perkebunan', 'owner_name' => 'Koperasi Desa', 'employee_count' => 15, 'annual_revenue' => 300000000, 'description' => 'Perkebunan kelapa rakyat'],
            
            // Perikanan
            ['name' => 'Tambak Ikan Lele', 'category' => 'perikanan', 'type' => 'Budidaya', 'owner_name' => 'Pak Sugianto', 'employee_count' => 4, 'annual_revenue' => 200000000, 'description' => 'Budidaya ikan lele'],
            ['name' => 'Kolam Ikan Nila', 'category' => 'perikanan', 'type' => 'Budidaya', 'owner_name' => 'Kelompok Nelayan', 'employee_count' => 6, 'annual_revenue' => 150000000, 'description' => 'Budidaya ikan nila air tawar'],
            
            // Pariwisata
            ['name' => 'Wisata Air Terjun Desa', 'category' => 'pariwisata', 'type' => 'Alam', 'owner_name' => 'Pokdarwis', 'employee_count' => 8, 'annual_revenue' => 100000000, 'description' => 'Destinasi wisata air terjun'],
            ['name' => 'Homestay Desa', 'category' => 'pariwisata', 'type' => 'Penginapan', 'owner_name' => 'Pak Rudi', 'employee_count' => 3, 'annual_revenue' => 80000000, 'description' => 'Penginapan untuk wisatawan'],
            
            // Akses Keuangan
            ['name' => 'BUMDes Kaana Jaya', 'category' => 'keuangan', 'type' => 'BUMDes', 'owner_name' => 'Pemerintah Desa', 'employee_count' => 5, 'annual_revenue' => 250000000, 'description' => 'Badan Usaha Milik Desa'],
            ['name' => 'Koperasi Simpan Pinjam', 'category' => 'keuangan', 'type' => 'Koperasi', 'owner_name' => 'Koperasi Desa', 'employee_count' => 3, 'annual_revenue' => 400000000, 'description' => 'Koperasi simpan pinjam warga'],
            ['name' => 'Agen Bank BRI', 'category' => 'keuangan', 'type' => 'Agen Bank', 'owner_name' => 'Bu Ning', 'employee_count' => 1, 'annual_revenue' => 50000000, 'description' => 'Agen bank untuk transaksi warga'],
        ];

        foreach ($data as $item) {
            EconomicActivity::create($item);
        }
    }
}
