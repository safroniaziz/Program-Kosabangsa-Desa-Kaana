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

        // Create UMKM data (25 UMKM Digital)
        $umkmTypes = [
            'Warung Makan Digital',
            'Toko Online',
            'Jasa Laundry Digital',
            'Kafe & Resto Digital',
            'Toko Kelontong Digital',
            'Jasa Fotografi',
            'Jasa Desain Grafis',
            'Toko Pakaian Online',
            'Jasa Perbaikan HP',
            'Warung Kopi Digital',
            'Toko Bahan Bangunan',
            'Jasa Catering',
            'Toko Elektronik',
            'Jasa Transportasi',
            'Toko Sembako Digital',
            'Jasa Cleaning Service',
            'Toko Alat Tulis',
            'Jasa Perawatan Hewan',
            'Toko Kue & Roti',
            'Jasa Konveksi',
            'Toko Obat Herbal',
            'Jasa Perbaikan AC',
            'Toko Mainan Anak',
            'Jasa Wedding Organizer',
            'Toko Aksesoris'
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

