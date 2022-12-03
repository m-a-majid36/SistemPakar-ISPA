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
            [
                'name'  => 'Banyak istirahat'
            ],
            [
                'name'  => 'Cairan ekstra'
            ],
            [
                'name'  => 'Dekongestan atau semprotan hidung (obat untuk menghilangkan gejala)'
            ],
            [
                'name'  => 'Diet sehat'
            ],
            [
                'name'  => 'Makan sup atau minum hangat'
            ],
            [
                'name'  => 'Obat penghilang rasa sakit seperti ibuprofen atau parasetamol'
            ],
            [
                'name'  => 'Obat kumur'
            ],
            [
                'name'  => 'Obat pelega tenggorokan atau tenggorokan'
            ],
            [
                'name'  => 'Inhalasi uap'
            ],
            [
                'name'  => 'Bilas hidung saline'
            ],
            [
                'name'  => 'Istirahat vokal'
            ],
            [
                'name'  => 'Menggunakan penyaring udara di rumah Anda'
            ],
            [
                'name'  => 'Hindari merokok dan alkohol'
            ],
            [
                'name'  => 'Antihistamin'
            ],
            [
                'name'  => 'Penghindaran alergen'
            ],
            [
                'name'  => 'Nasal douche'
            ],
        ];

        foreach ($treatment as $data) {
            Treatment::create($data);
        }
    }
}
