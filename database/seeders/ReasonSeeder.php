<?php

namespace Database\Seeders;

use App\Models\Reason;
use Illuminate\Database\Seeder;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reason = [
            [
                'name'	=>	'Influenza',
                'category'	=>	'V'
            ],
            [
                'name'	=>	'Adenovirus',
                'category'	=>	'V'
            ],
            [
                'name'	=>	'Rhinovirus',
                'category'	=>	'V'
            ],
            [
                'name'	=>	'SARS-CoV-2 (Corona atau COVID-19)',
                'category'	=>	'V'
            ],
            [
                'name'	=>	'Epstein-Barr',
                'category'	=>	'V'
            ],
            [
                'name'	=>	'Streptococcus pneumoniae',
                'category'	=>	'B'
            ],
            [
                'name'	=>	'Haemophilus influenzae tipe B (Hib)',
                'category'	=>	'B'
            ],
            [
                'name'	=>	'Mycoplasma pneumonia',
                'category'	=>	'B'
            ],
            [
                'name'	=>	'Corynebacterium diphtheria',
                'category'	=>	'B'
            ],            
        ];

        foreach ($reason as $data) {
            Reason::create($data);
        }
    }
}
