<?php

namespace App\Services\AssessmentQuestions;

class ChecklistMasalahQuestions
{
    const SYMPTOMS = [
        'Pening',
        'Tenggorokan Kering', 
        'Perut Serasa Tertekan',
        'Dada Sesak/ nyeri',
        'Jantung berdebar',
        'Sakit kepala',
        'Nyeri lambung',
        'Diare/ mencret',
        'Alergi/ gatal-gatal',
        'Otot tegang',
        'Kejang',
        'Tidak bertenaga',
        'Rahang terkatup ketat',
        'Duduk tidak tenang',
        'Banyak berkeringat',
        'Denyut nadi cepat',
        'Menggemeretakan gigi',
        'Rasa takut',
        'Mati rasa',
        'Terguncang',
        'Mengingkari',
        'Marah',
        'Putus asa',
        'Menyerah',
        'Pasrah',
        'Menyalahkan',
        'Sinis',
        'Menyesal',
        'Merasa tidak berdaya',
        'Hilang kepercayaan',
        'Khawatir',
        'Bosan',
        'Merasa terasing',
        'Murung',
        'Merasa bingung',
        'Tidak dapat berkonsentrasi',
        'Sulit mengingat',
        'Mudah terganggu',
        'Mimpi buruk',
        'Pikiran negatif',
        'Khayalan',
        'Berkhayal tidak wajar',
        'Hilang minat',
        'Kehilangan kepercayaan diri',
        'Ragu-ragu',
        'Tidak percaya',
        'Menarik diri',
        'Mudah tersinggung',
        'Agresif',
        'Menangis',
        'Menyendiri',
        'Apatis',
        'Mudah curiga',
        'Gelisah',
        'Tidak sabaran',
        'Mondar mandir',
        'Menggigit kuku',
        'Berteriak-teriak',
        'Suka meludah',
        'Berbicara kotor',
        'Sulit tidur',
        'Makan berlebihan',
        'Tidak mau makan',
        'Menyalahkan Tuhan',
        'Berhenti beribadah',
        'Tidak berdaya',
        'Marah kepada Tuhan',
        'Meragukan keyakinan',
        'Tidak tulus',
        'Merasa terancam',
        'Merasa jadi korban orang',
        'Bersibuk dengan diri sendiri'
    ];

    const SCALE_OPTIONS = [
        0 => "Tidak Ada",
        1 => "Ada"
    ];

    const INSTRUCTIONS = "Petunjuk: Berilah tanda silang (X) pada setiap gejala yang terasa setelah musibah/bencana. Pilih 'Ada' jika Anda mengalami gejala tersebut, atau 'Tidak Ada' jika tidak mengalami.";

    const DISCLAIMER = "Penting: Instrumen ini hanya untuk tujuan skrining awal dan bukan merupakan alat diagnostik. Hasil assessment ini tidak menggantikan evaluasi klinis oleh profesional kesehatan mental yang berkualitas. Jika Anda mengalami distress yang signifikan atau memiliki kekhawatiran tentang kesehatan mental Anda, silakan berkonsultasi dengan profesional kesehatan mental.";

    public static function getAllSymptoms(): array
    {
        return self::SYMPTOMS;
    }

    public static function getScaleOptions(): array
    {
        return self::SCALE_OPTIONS;
    }

    public static function getTotalSymptoms(): int
    {
        return count(self::SYMPTOMS);
    }

    public static function calculateTotalScore(array $responses): int
    {
        return array_sum($responses);
    }

    public static function getSymptom(int $index): ?string
    {
        return self::SYMPTOMS[$index] ?? null;
    }
}
