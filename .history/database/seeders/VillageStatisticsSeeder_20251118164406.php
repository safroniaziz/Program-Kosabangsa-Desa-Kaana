<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageStatistic;

class VillageStatisticsSeeder extends Seeder
{
    public function run(): void
    {
        $statistics = [
            [
                'key' => 'total_population',
                'label' => 'Jumlah Penduduk',
                'value' => 80,
                'subtext' => 'Analitik demografi terverifikasi 2023',
                'icon' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'key' => 'total_households',
                'label' => 'Kepala Keluarga',
                'value' => 329,
                'subtext' => 'Aktif terdaftar pada administrasi desa',
                'icon' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'key' => 'active_umkm',
                'label' => 'UMKM Aktif',
                'value' => 25,
                'subtext' => 'Cluster usaha prioritas desa',
                'icon' => null,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'key' => 'total_dusun',
                'label' => 'Dusun & Rukun Warga',
                'value' => 15,
                'subtext' => 'Wilayah kerja pemerintahan desa',
                'icon' => null,
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($statistics as $stat) {
            VillageStatistic::updateOrCreate(
                ['key' => $stat['key']],
                $stat
            );
        }

        $this->command->info('Village statistics seeded successfully.');
    }
}
