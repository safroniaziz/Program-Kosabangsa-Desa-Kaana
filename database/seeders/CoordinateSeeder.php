<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coordinate;

class CoordinateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coordinates = [
            [
                'name' => 'Pusat Pelayanan Kesehatan Desa Kaana',
                'address' => 'Desa Kaana, Kecamatan Enggano, Kabupaten Bengkulu Utara',
                'latitude' => -5.3833,
                'longitude' => 102.2667,
                'region' => 'Bengkulu Utara',
                'description' => 'Fasilitas kesehatan utama di Desa Kaana'
            ],
            [
                'name' => 'Puskesmas Enggano',
                'address' => 'Jl. Lintas Enggano, Desa Kaana, Kecamatan Enggano',
                'latitude' => -5.3812,
                'longitude' => 102.2689,
                'region' => 'Bengkulu Utara',
                'description' => 'Pusat Kesehatan Masyarakat Kecamatan Enggano'
            ],
            [
                'name' => 'Klinik Rawat Jalan Desa Kaana',
                'address' => 'Desa Kaana, Kecamatan Enggano',
                'latitude' => -5.3845,
                'longitude' => 102.2654,
                'region' => 'Bengkulu Utara',
                'description' => 'Klinik pelayanan kesehatan rawat jalan'
            ],
            [
                'name' => 'Pos Kesehatan Dusun 1',
                'address' => 'Dusun 1, Desa Kaana, Kecamatan Enggano',
                'latitude' => -5.3821,
                'longitude' => 102.2678,
                'region' => 'Bengkulu Utara',
                'description' => 'Pos kesehatan untuk Dusun 1'
            ],
            [
                'name' => 'Pos Kesehatan Dusun 2',
                'address' => 'Dusun 2, Desa Kaana, Kecamatan Enggano',
                'latitude' => -5.3856,
                'longitude' => 102.2643,
                'region' => 'Bengkulu Utara',
                'description' => 'Pos kesehatan untuk Dusun 2'
            ],
            [
                'name' => 'Pos Kesehatan Pantai',
                'address' => 'Pantai Desa Kaana, Kecamatan Enggano',
                'latitude' => -5.3798,
                'longitude' => 102.2621,
                'region' => 'Bengkulu Utara',
                'description' => 'Pos kesehatan dekat area pantai'
            ],
            [
                'name' => 'Klinik Kesehatan Jiwa',
                'address' => 'Desa Kaana, Kecamatan Enggano',
                'latitude' => -5.3834,
                'longitude' => 102.2691,
                'region' => 'Bengkulu Utara',
                'description' => 'Klinik khusus pelayanan kesehatan mental'
            ],
            [
                'name' => 'Rumah Singgah Pasien',
                'address' => 'Desa Kaana, Kecamatan Enggano',
                'latitude' => -5.3867,
                'longitude' => 102.2672,
                'region' => 'Bengkulu Utara',
                'description' => 'Tempat penampungan sementara pasien dari pulau lain'
            ],
            [
                'name' => 'Pos Gizi Anak',
                'address' => 'Desa Kaana, Kecamatan Enggano',
                'latitude' => -5.3829,
                'longitude' => 102.2648,
                'region' => 'Bengkulu Utara',
                'description' => 'Pos pelayanan gizi dan kesehatan anak'
            ],
            [
                'name' => 'Pos Obat Desa',
                'address' => 'Desa Kaana, Kecamatan Enggano',
                'latitude' => -5.3841,
                'longitude' => 102.2665,
                'region' => 'Bengkulu Utara',
                'description' => 'Pos penyediaan obat-obatan esensial'
            ]
        ];

        foreach ($coordinates as $coordinate) {
            Coordinate::create($coordinate);
        }
    }
}