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
                'name'      => 'Rhinovirus',
                'category'  => 'V'
            ],
            [
                'name'      => 'Adenovirus',
                'category'  => 'V'
            ],
            [
                'name'      => 'Coxsackievirus',
                'category'  => 'V'
            ],
            [
                'name'      => 'Parainfluenza',
                'category'  => 'V'
            ],
            [
                'name'      => 'Sinsitium saluran pernapasan',
                'category'  => 'V'
            ],
            [
                'name'      => 'Metapneumovirus',
                'category'  => 'V'
            ],
            [
                'name'      => 'Streptokokus beta-hemolitik kelompok A',
                'category'  => 'B'
            ],
            [
                'name'      => 'Streptokokus beta-hemolitik kelompok C',
                'category'  => 'B'
            ],
            [
                'name'      => 'Corynebacterium diphtheriae (diphtheria)',
                'category'  => 'B'
            ],
            [
                'name'      => 'Neisseria gonorrhoeae (gonore)',
                'category'  => 'B'
            ],
            [
                'name'      => 'Chlamydia pneumoniae (chlamydia)',
                'category'  => 'B'
            ],
        ];

        foreach ($reason as $data) {
            Reason::create($data);
        }
    }
}
