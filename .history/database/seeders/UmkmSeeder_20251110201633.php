<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coordinate;
use Faker\Factory as Faker;

class UmkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Create UMKM data (25 UMKM Digital) - Realistis untuk desa terpencil
        $umkmTypes = [
            'Warung Makan Digital',
            'Toko Sembako Digital',
            'Toko Kelontong Digital',
            'Warung Kopi Digital',
            'Toko Pakaian Online',
            'Jasa Fotografi',
            'Toko Bahan Bangunan',
            'Toko Alat Tulis',
            'Toko Kue & Roti',
            'Jasa Konveksi',
            'Toko Obat Herbal',
            'Toko Mainan Anak',
            'Toko Aksesoris',
            'Warung Nasi Padang Digital',
            'Toko Ikan Segar Online',
            'Toko Sayur & Buah Digital',
            'Jasa Perbaikan HP',
            'Toko Bahan Pokok',
            'Warung Mie Ayam Digital',
            'Toko Alat Pertanian',
            'Jasa Penjahit Digital',
            'Toko Bahan Kue',
            'Warung Bakso Digital',
            'Toko Perlengkapan Rumah Tangga',
            'Jasa Desain Grafis'
        ];

        $regions = ['Bengkulu Utara', 'Enggano', 'Desa Kaana'];

        $this->command->info("Creating 25 UMKM Digital...");

        foreach ($umkmTypes as $index => $umkmName) {
            Coordinate::create([
                'name' => $umkmName,
                'address' => $faker->streetAddress() . ', Desa Kaana, Kecamatan Enggano',
                'latitude' => -5.38 + ($faker->randomFloat(4, -0.01, 0.01)), // Around Desa Kaana
                'longitude' => 102.26 + ($faker->randomFloat(4, -0.01, 0.01)),
                'region' => $faker->randomElement($regions),
                'description' => 'UMKM Digital - ' . $umkmName . ' di Desa Kaana',
            ]);
        }

        $this->command->info("✓ Successfully created 25 UMKM Digital!");
    }
}

