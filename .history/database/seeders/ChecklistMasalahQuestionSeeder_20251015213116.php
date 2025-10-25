<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChecklistMasalahQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            // Gejala 1: Fisik
            ['question' => 'Pening', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 1],
            ['question' => 'Tenggorokan Kering', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 2],
            ['question' => 'Perut Serasa Tertekan', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 3],
            ['question' => 'Dada Sesak/ nyeri', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 4],
            ['question' => 'Jantung berdebar', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 5],
            ['question' => 'Sakit kepala', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 6],
            ['question' => 'Nyeri lambung', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 7],
            ['question' => 'Diare/ menceret', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 8],
            ['question' => 'Alergi/ gatal-gatal', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 9],
            ['question' => 'Otot tegang', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 10],
            ['question' => 'Kejang', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 11],
            ['question' => 'Tidak bertenaga', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 12],
            ['question' => 'Rahang terkatup ketat', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 13],
            ['question' => 'Duduk tidak tenang', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 14],
            ['question' => 'Banyak berkeringat', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 15],
            ['question' => 'Denyut nadi cepat', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 16],
            ['question' => 'Menggeretakkan gigi', 'category' => 1, 'category_name' => 'Fisik', 'order_number' => 17],

            // Gejala 2: Emosi
            ['question' => 'Rasa takut', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 1],
            ['question' => 'Mati rasa', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 2],
            ['question' => 'Terguncang', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 3],
            ['question' => 'Mengingkari', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 4],
            ['question' => 'Marah', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 5],
            ['question' => 'Putus asa', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 6],
            ['question' => 'Menyerah', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 7],
            ['question' => 'Pasrah', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 8],
            ['question' => 'Menyalahkan', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 9],
            ['question' => 'Sinis', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 10],
            ['question' => 'Menyesal', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 11],
            ['question' => 'Merasa tidak berdaya', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 12],
            ['question' => 'Hilang kepercayaan', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 13],
            ['question' => 'Khawatir', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 14],
            ['question' => 'Bosan', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 15],
            ['question' => 'Merasa terasing', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 16],
            ['question' => 'Murung', 'category' => 2, 'category_name' => 'Emosi', 'order_number' => 17],

            // Gejala 3: Mental
            ['question' => 'Tidak percaya', 'category' => 3, 'category_name' => 'Mental', 'order_number' => 1],
            ['question' => 'Tidak konsentrasi', 'category' => 3, 'category_name' => 'Mental', 'order_number' => 2],
            ['question' => 'Mudah lupa', 'category' => 3, 'category_name' => 'Mental', 'order_number' => 3],
            ['question' => 'Banyak pikiran', 'category' => 3, 'category_name' => 'Mental', 'order_number' => 4],
            ['question' => 'Sulit mengambil keputusan', 'category' => 3, 'category_name' => 'Mental', 'order_number' => 5],
            ['question' => 'Curiga', 'category' => 3, 'category_name' => 'Mental', 'order_number' => 6],
            ['question' => 'Lelah berpikir', 'category' => 3, 'category_name' => 'Mental', 'order_number' => 7],
            ['question' => 'Merasa terbebani', 'category' => 3, 'category_name' => 'Mental', 'order_number' => 8],
            ['question' => 'Merasa banyak melayani orang', 'category' => 3, 'category_name' => 'Mental', 'order_number' => 9],
            ['question' => 'Gelisah', 'category' => 3, 'category_name' => 'Mental', 'order_number' => 10],
            ['question' => 'Terlalu banyak gerak', 'category' => 3, 'category_name' => 'Mental', 'order_number' => 11],

            // Gejala 4: Perilaku
            ['question' => 'Sulit tidur', 'category' => 4, 'category_name' => 'Perilaku', 'order_number' => 1],
            ['question' => 'Kehilangan selera', 'category' => 4, 'category_name' => 'Perilaku', 'order_number' => 2],
            ['question' => 'Makan berlebihan', 'category' => 4, 'category_name' => 'Perilaku', 'order_number' => 3],
            ['question' => 'Banyak merokok', 'category' => 4, 'category_name' => 'Perilaku', 'order_number' => 4],
            ['question' => 'Minum alcohol dan narkoba', 'category' => 4, 'category_name' => 'Perilaku', 'order_number' => 5],
            ['question' => 'Menghindar', 'category' => 4, 'category_name' => 'Perilaku', 'order_number' => 6],
            ['question' => 'Menangis', 'category' => 4, 'category_name' => 'Perilaku', 'order_number' => 7],
            ['question' => 'Tidak mampu berbicara', 'category' => 4, 'category_name' => 'Perilaku', 'order_number' => 8],
            ['question' => 'Tidak bergerak', 'category' => 4, 'category_name' => 'Perilaku', 'order_number' => 9],
            ['question' => 'Mudah marah', 'category' => 4, 'category_name' => 'Perilaku', 'order_number' => 10],
            ['question' => 'Ingin bunuh diri', 'category' => 4, 'category_name' => 'Perilaku', 'order_number' => 11],
            ['question' => 'Menggerakan anggota tubuh berulang-ulang', 'category' => 4, 'category_name' => 'Perilaku', 'order_number' => 12],

            // Gejala 5: Spiritual
            ['question' => 'Menyalahkan tuhan', 'category' => 5, 'category_name' => 'Spiritual', 'order_number' => 1],
            ['question' => 'Berhenti beribadah', 'category' => 5, 'category_name' => 'Spiritual', 'order_number' => 2],
            ['question' => 'Tidak berdaya', 'category' => 5, 'category_name' => 'Spiritual', 'order_number' => 3],
            ['question' => 'Marah kepada tuhan', 'category' => 5, 'category_name' => 'Spiritual', 'order_number' => 4],
            ['question' => 'Meragukan keyakinan', 'category' => 5, 'category_name' => 'Spiritual', 'order_number' => 5],
            ['question' => 'Tidak tulus', 'category' => 5, 'category_name' => 'Spiritual', 'order_number' => 6],
            ['question' => 'Merasa terancam', 'category' => 5, 'category_name' => 'Spiritual', 'order_number' => 7],
            ['question' => 'Merasa jadi korban orang', 'category' => 5, 'category_name' => 'Spiritual', 'order_number' => 8],
            ['question' => 'Bersibuk dengan diri sendiri', 'category' => 5, 'category_name' => 'Spiritual', 'order_number' => 9],
            ['question' => 'Merasa kecewa', 'category' => 5, 'category_name' => 'Spiritual', 'order_number' => 10],
            ['question' => 'Menyesali diri', 'category' => 5, 'category_name' => 'Spiritual', 'order_number' => 11],
            ['question' => 'Menggerutu', 'category' => 5, 'category_name' => 'Spiritual', 'order_number' => 12],
        ];

        foreach ($questions as $question) {
            \App\Models\ChecklistMasalahQuestion::create($question);
        }
    }
}
