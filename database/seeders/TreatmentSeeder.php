<?php

namespace Database\Seeders;

use App\Models\Treatment;
use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $treatment = [
            ['name' =>	'Tirah baring / istirahat (bed rest)'],
            ['name' =>	'Pemasukan salin steril melalui hidung'],
            ['name' =>	'Tetes hidung (paling baik digunakan 15-20 menit sebelum makan dan sebelum tidur 1-2 tetes setiap lubang hidung)'],
            ['name' =>	'Obat peroral (obat minum) dengan Pensilin 3x1 hari selama 10 hari untuk mengurangi nyeri tenggorokan'],
            ['name' =>	'Minum cairan jahe hangat'],
            ['name' =>	'Terapi croup di Rumah #akit'],
            ['name' =>	'Menghindari udara malam'],
            ['name' =>	'Melakukan pemeriksaan ke dokter'],
            ['name' =>	'Dilarang telentang karena risiko bertambahnya agitasi'],
            ['name' =>	'Pemberian vaksin Pneumonia'],
            ['name' =>	'Perbanyak istirahat'],
            ['name' =>	'Berkumur dengan air garam hangat'],
            ['name' =>	'Menggunakan penghilang rasa sakit seperti Acetaminophen'],
            ['name' =>	'Minum air hangat'],
            ['name' =>	'Kurangi minuman dingin'],
            ['name' =>	'Pemberian vaksin Difteri'],
        ];

        foreach ($treatment as $data) {
            Treatment::create($data);
        }
    }
}
