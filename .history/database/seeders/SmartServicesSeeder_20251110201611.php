<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coordinate;
use Faker\Factory as Faker;

class SmartServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Create Smart Services data - Realistis untuk desa terpencil
        $smartServices = [
            [
                'name' => 'Pos Pelayanan Administrasi Desa',
                'description' => 'Layanan administrasi kependudukan dan surat-menyurat digital'
            ],
            [
                'name' => 'Perpustakaan Digital Desa',
                'description' => 'Akses buku digital dan literasi masyarakat'
            ],
            [
                'name' => 'Layanan Internet Publik',
                'description' => 'WiFi gratis untuk warga desa'
            ],
            [
                'name' => 'Sistem Informasi Desa',
                'description' => 'Portal informasi desa dan pengumuman'
            ],
            [
                'name' => 'Layanan Pengaduan Online',
                'description' => 'Platform pengaduan dan aspirasi warga'
            ],
            [
                'name' => 'Sistem Pencatatan Sipil Digital',
                'description' => 'Pencatatan kelahiran, kematian, dan pernikahan digital'
            ],
            [
                'name' => 'Layanan Bantuan Sosial Digital',
                'description' => 'Pendaftaran dan monitoring bantuan sosial'
            ],
            [
                'name' => 'Sistem Monitoring Pertanian',
                'description' => 'Informasi cuaca dan pertanian digital'
            ],
            [
                'name' => 'Layanan Pendidikan Digital',
                'description' => 'Akses materi pembelajaran online'
            ],
            [
                'name' => 'Sistem Keamanan Desa',
                'description' => 'Monitoring keamanan dan pos ronda digital'
            ],
            [
                'name' => 'Layanan Koperasi Digital',
                'description' => 'Simpan pinjam dan koperasi digital'
            ],
            [
                'name' => 'Sistem Informasi Kesehatan',
                'description' => 'Informasi kesehatan dan imunisasi digital'
            ],
            [
                'name' => 'Layanan Transportasi Desa',
                'description' => 'Informasi transportasi dan jadwal perjalanan'
            ],
            [
                'name' => 'Sistem Pasar Digital',
                'description' => 'Platform jual beli hasil pertanian dan produk lokal'
            ],
            [
                'name' => 'Layanan Konsultasi Online',
                'description' => 'Konsultasi hukum, kesehatan, dan pertanian online'
            ]
        ];

        $regions = ['Bengkulu Utara', 'Enggano', 'Desa Kaana'];

        $this->command->info("Creating " . count($smartServices) . " Smart Services...");

        foreach ($smartServices as $service) {
            Coordinate::create([
                'name' => $service['name'],
                'address' => 'Desa Kaana, Kecamatan Enggano, Kabupaten Bengkulu Utara',
                'latitude' => -5.38 + ($faker->randomFloat(4, -0.01, 0.01)),
                'longitude' => 102.26 + ($faker->randomFloat(4, -0.01, 0.01)),
                'region' => $faker->randomElement($regions),
                'description' => $service['description'],
            ]);
        }

        $this->command->info("✓ Successfully created " . count($smartServices) . " Smart Services!");
    }
}

