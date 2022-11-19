<?php

namespace Database\Seeders;

use App\Models\Frontend;
use Illuminate\Database\Seeder;

class FrontendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Frontend::create([
            'email'             => 'ayundamitaaprilia@gmail.com',
            'phone'             => '+62 822-2009-9116',
            'twitter'           => '',
            'facebook'          => '',
            'instagram'         => 'https://www.instagram.com/tulmitul/',
            'linkedin'          => '',
            'main_picture'      => 'picture-frontend/hero-bg.jpg',
            'main_title'        => 'Apa itu ISPA?',
            'main_subtitle'     => 'Infeksi saluran pernapasan akut atau ISPA adalah infeksi yang terjadi di saluran pernapasan,
                                    baik saluran pernapasan atas maupun bawah. Infeksi ini dapat menimbulkan gejala batuk,
                                    pilek, dan demam. ISPA sangat mudah menular dan dapat dialami oleh siapa saja, terutama
                                    anak-anak dan lansia.',
            'title1'            => 'Sistem Pakar Terpercaya',
            'subtitle1'         => 'Diagnosa kesehatan dapat diakses dengan mudah di
                                    website ini.',
            'title2'            => 'Kapan Saja, Di Mana Saja',
            'subtitle2'         => 'Semua layanan di website selalu ada 24 jam untukmu dan
                                    keluarga.',
            'title3'            => 'Mudah, Aman & Nyaman',
            'subtitle3'         => 'Layanan sistem pakar website siap penuhi kebutuhan
                                    kesehatanmu setiap saat.',
            'second_title'      => 'Kebutuhan Sehatmu Hanya dengan Sentuhan Jari',
            'second_subtitle'   => 'Akses layanan diagnosa penyakit laptop maupun smartphone. Manjadi lebih mudah dan praktis.',
            'second_picture'    => 'picture-frontend/img.png',
            'content1_picture'  => 'picture-frontend/medical-team.png',
            'content1_title'    => 'Tenaga Medis Berpengalaman',
            'content1_subtitle' => 'Sistem Pakar ini dikelola oleh beberapa tenaga medis berpengalaman di
                                    bidangnya.',
            'content2_picture'  => 'picture-frontend/doctor-male.png',
            'content2_title'    => 'Dokter Pria',
            'content2_subtitle' => 'Terdapat dokter pria yang dapat menjadikan konsultasi lebih nyaman dan privasi terjaga',
            'content3_picture'  => 'picture-frontend/doctor-female.png',
            'content3_title'    => 'Dokter Wanita',
            'content3_subtitle' => 'Terdapat dokter wanita yang dapat menjadikan konsultasi lebih nyaman dan privasi terjaga',
        ]);
    }
}
