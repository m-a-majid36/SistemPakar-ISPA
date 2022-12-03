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
            [
                'name'  => 'Bersin-bersin'
            ],
            [
                'name'  => 'Sakit tenggorokan'
            ],
            [
                'name'  => 'Keluarnya lendir encer dari hidung'
            ],
            [
                'name'  => 'Hidung tersumbat'
            ],
            [
                'name'  => 'Kelelahan'
            ],
            [
                'name'  => 'Tenggorokan kering'
            ],
            [
                'name'  => 'Badan terasa tidak sehat'
            ],
            [
                'name'  => 'Nyeri saat menelan'
            ],
            [
                'name'  => 'Rasa sakit dan tekanan di wajah'
            ],
            [
                'name'  => 'Sakit kepala'
            ],
            [
                'name'  => 'Kehilangan bau dan rasa'
            ],
            [
                'name'  => 'Keluarnya lendir kental dari hidung'
            ],
            [
                'name'  => 'Batuk berdahak'
            ],
            [
                'name'  => 'Suara serak'
            ],
            [
                'name'  => 'Kehilangan suara'
            ],
            [
                'name'  => 'Tenggorokan (amandel) bengkak'
            ],
            [
                'name'  => 'Tenggorokan terasa kotor'
            ],
            [
                'name'  => 'Mata gatal dan berair'
            ]
        ];

        foreach ($disease as $data) {
            Disease::create($data);
        }
    }
}
