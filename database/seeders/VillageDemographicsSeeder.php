<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VillageDemographic;

class VillageDemographicsSeeder extends Seeder
{
    public function run(): void
    {
        $demographics = [
            [
                'key' => 'gender_balance',
                'title' => 'Demografi Seimbang',
                'value' => '52.2% : 47.8%',
                'description' => 'Struktur gender yang relatif seimbang memberikan basis partisipasi yang kuat untuk program pemberdayaan masyarakat.',
                'icon' => null,
                'color' => 'sky',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'key' => 'productive_age',
                'title' => 'Dominasi Usia Produktif',
                'value' => '54.4% penduduk aktif',
                'description' => 'Mayoritas penduduk berada pada rentang usia produktif sehingga potensial untuk peningkatan produktivitas ekonomi lokal.',
                'icon' => null,
                'color' => 'emerald',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'key' => 'education_quality',
                'title' => 'Kualitas Pendidikan',
                'value' => null,
                'description' => 'Tingkat pendidikan yang memadai mendukung pengembangan SDM dan inovasi di desa.',
                'icon' => null,
                'color' => 'violet',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($demographics as $demo) {
            VillageDemographic::updateOrCreate(
                ['key' => $demo['key']],
                $demo
            );
        }

        $this->command->info('Village demographics seeded successfully.');
    }
}
