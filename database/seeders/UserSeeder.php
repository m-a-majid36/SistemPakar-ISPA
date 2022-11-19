<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'      => 'Ayunda Mita Aprilia',
                'username'  => 'mita',
                'phone'     => '082220099116',
                'role'      => 'admin',
                'gender'    => 'P',
                'email'     => 'admin@admin.com',
                'password'  => bcrypt('password'),
            ],
            [
                'name'      => 'Dokter1',
                'username'  => 'dokter1',
                'phone'     => '081111111111',
                'role'      => 'dokter',
                'gender'    => 'L',
                'email'     => 'dokter1@dokter.com',
                'password'  => bcrypt('password')
            ],
            [
                'name'      => 'Pasien1',
                'username'  => 'pasien1',
                'phone'     => '082222222222',
                'role'      => 'pasien',
                'gender'    => 'L',
                'email'     => 'pasien1@pasien.com',
                'password'  => bcrypt('password')
            ]
        ];

        foreach ($user as $data) {
            User::create($data);
        }
    }
}
