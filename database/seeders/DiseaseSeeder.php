<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disease = [
            ['name'	=>	'Demam'],
            ['name'	=>	'Iritabilitas (gelisah)'],
            ['name'	=>	'Bersin'],
            ['name'	=>	'Muntah'],
            ['name'	=>	'Rasa mengigil'],
            ['name'	=>	'Nyeri otot'],
            ['name'	=>	'Ingus encer'],
            ['name'	=>	'Nafsu makan berkurang'],
            ['name'	=>	'Malaise (lemas)'],
            ['name'	=>	'Nyeri tenggorokan'],
            ['name'	=>	'Suara parau / serak'],
            ['name'	=>	'Rhinitis (peradangan pada hidung)'],
            ['name'	=>	'Sakit kepala'],
            ['name'	=>	'Nyeri saat menelan'],
            ['name'	=>	'Dispnea (sesak napas)'],
            ['name'	=>	'Obstruksi pernapasan yang progresivitasnya cepat'],
            ['name'	=>	'Afonia (suara menghilang)'],
            ['name'	=>	'Retraksi (terjadinya kontraksi yang berhubungan dengan otot dada dan otot perut saat menghirup napas)'],
            ['name'	=>	'Mudah lelah'],
            ['name'	=>	'Pernapasan lambat dan berat'],
            ['name'	=>	'Nadi terasa cepat'],
            ['name'	=>	'Rianosis (kulit membiru)'],
            ['name'	=>	'Batuk kering'],
            ['name'	=>	'Batuk berdahak'],
            ['name'	=>	'Batuk pilek'],
            ['name'	=>	'Keringat berlebih'],
            ['name'	=>	'Napas terengah-engah'],
            ['name'	=>	'Diare'],
            ['name'	=>	'Aroma napas tidak sedap'],
            ['name'	=>	'Mual'],
            ['name'	=>	'Mimisan'],
            ['name'	=>	'Muncul benjolan di leher'],
            ['name'	=>	'Bunyi pernapasan seperti orang mengorok']
        ];

        foreach ($disease as $data) {
            Disease::create($data);
        }
    }
}
