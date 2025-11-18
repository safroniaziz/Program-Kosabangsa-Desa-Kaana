<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coordinate;

class CoordinatesPOISeeder extends Seeder
{
    public function run(): void
    {
        $pois = [
            [
                'name' => 'Danau Onta',
                'description' => 'Danau alami di Desa Ka\'ana, Potensi wisata alam dan keheningan.',
                'latitude' => -5.476712441788056,
                'longitude' => 102.26697600871147,
                'region' => 'Desa Kaana',
                'category' => 'nature',
                'image_url' => 'https://indonesiatraveler.id/wp-content/uploads/2020/07/Pulau-Enggano-Danau-Bak-Blau-photo-by-IG-of-Randiipanduprayetno.jpg',
                'is_point_of_interest' => true,
            ],
            [
                'name' => 'Danau Pulau',
                'description' => 'Danau seluas ± 1,76 ha yang dikelilingi hutan lindung sebagai tangkapan air bagi sawah Desa Ka\'ana.',
                'latitude' => -5.403715473561784,
                'longitude' => 102.33866884546806,
                'region' => 'Desa Kaana',
                'category' => 'nature',
                'image_url' => 'https://radarutara.disway.id/upload/9fa5560528b2420d55ec68f3e9d5fdad.jpg',
                'is_point_of_interest' => true,
            ],
            [
                'name' => 'Masjid Pal Empat Ka\'ana',
                'description' => 'Masjid lokal di Ka\'ana – detail sejarah dan kapasitas perlu diverifikasi.',
                'latitude' => -5.4038399900619,
                'longitude' => 102.35621881872818,
                'region' => 'Desa Kaana',
                'category' => 'worship',
                'image_url' => 'https://milenianews.com/wp-content/uploads/2024/11/shigor-bengkulu-enggano1-2048x1152.jpg',
                'is_point_of_interest' => true,
            ],
            [
                'name' => 'Pesantren As Salam Al Azhar',
                'description' => 'Pondok pesantren dan madrasah di Ka\'ana – pusat pendidikan agama di wilayah terpencil.',
                'latitude' => -5.385645633181521,
                'longitude' => 102.34737400107242,
                'region' => 'Desa Kaana',
                'category' => 'education',
                'image_url' => 'https://i.ytimg.com/vi/mLtOII3oUVQ/maxresdefault.jpg',
                'is_point_of_interest' => true,
            ],
            [
                'name' => 'Al Muhsineen Jami Mosque Kaana',
                'description' => 'Masjid jami di Desa Ka\'ana – informasi lanjutan perlu dikumpulkan.',
                'latitude' => -5.375209707505798,
                'longitude' => 102.34750067015548,
                'region' => 'Desa Kaana',
                'category' => 'worship',
                'image_url' => 'https://pontianakinformasi.co.id/wp-content/uploads/2023/02/masjid-jami-pontianak.jpg',
                'is_point_of_interest' => true,
            ],
            [
                'name' => 'Pantai Kikuba',
                'description' => 'Pantai di Desa Ka\'ana yang mulai dikembangkan sebagai destinasi wisata laut (memancing, snorkeling).',
                'latitude' => -5.3721312219924755,
                'longitude' => 102.35125850293794,
                'region' => 'Desa Kaana',
                'category' => 'nature',
                'image_url' => 'https://indonesiatraveler.id/wp-content/uploads/2020/06/Bengkulu-Pulau-Enggano-HD-696x462.jpg',
                'is_point_of_interest' => true,
            ],
            [
                'name' => 'Pantai Ka\'ana Enggano',
                'description' => 'Pantai alami yang cukup sepi di Desa Ka\'ana – cocok untuk wisata santai dan menikmati alam.',
                'latitude' => -5.371939736733691,
                'longitude' => 102.34494120137057,
                'region' => 'Desa Kaana',
                'category' => 'nature',
                'image_url' => 'https://live.staticflickr.com/7565/26848426593_5fa6c083ee_b.jpg',
                'is_point_of_interest' => true,
            ],
            [
                'name' => 'Kaana Beach Camp & Resort',
                'description' => 'Akomodasi penginapan dekat pantai di Desa Ka\'ana (Kaana Beach Camp & Resort).',
                'latitude' => -5.371497895633549,
                'longitude' => 102.34261861727693,
                'region' => 'Desa Kaana',
                'category' => 'tourism',
                'image_url' => 'https://www.sahabatrakyat.com/wp-content/uploads/2022/11/IMG_20220216_110418-scaled.jpg',
                'is_point_of_interest' => true,
            ],
            [
                'name' => 'Pondok Kebun',
                'description' => 'Penginapan atau akomodasi lokal di Desa Ka\'ana – jenis dan fasilitas perlu dilengkapi.',
                'latitude' => -5.374811972028578,
                'longitude' => 102.33559135559713,
                'region' => 'Desa Kaana',
                'category' => 'tourism',
                'image_url' => 'https://i.pinimg.com/736x/bb/c5/af/bbc5af7c4ef206ca8262becb439020b0.jpg',
                'is_point_of_interest' => true,
            ],
            [
                'name' => 'Pantai Be\'wa Trans Malakoni',
                'description' => 'Pantai di jalur Trans-Malakoni dekat Desa Ka\'ana – potensi wisata alam cukup besar.',
                'latitude' => -5.364648747359315,
                'longitude' => 102.3306204926123,
                'region' => 'Desa Kaana',
                'category' => 'nature',
                'image_url' => 'https://static.tripzilla.id/media/28324/conversions/pulau-enggano-9-819x1024-w768.webp',
                'is_point_of_interest' => true,
            ],
            [
                'name' => 'Masjid Trans Ka\'ana',
                'description' => 'Masjid di jalan Trans Ka\'ana/Trans Malakoni – informasi lebih lanjut masih terbatas.',
                'latitude' => -5.367506250804365,
                'longitude' => 102.32477676957377,
                'region' => 'Desa Kaana',
                'category' => 'worship',
                'image_url' => 'https://bengkuluekspress.disway.id/upload/26abeb17f8fcd44cc2fd6e5a8406085b.jpeg',
                'is_point_of_interest' => true,
            ],
        ];

        foreach ($pois as $poi) {
            Coordinate::updateOrCreate(
                [
                    'name' => $poi['name'],
                    'region' => $poi['region'],
                ],
                $poi
            );
        }

        $this->command->info('Points of Interest seeded successfully.');
    }
}
