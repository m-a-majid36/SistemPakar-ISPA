@extends('frontend.layouts.app')
@section('title', 'Home')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center"
        style="background: url('{{ asset('frontend/images/hero-bg.jpg') }}') top center;">
        <div class="container">
            <h1>Sistem Pakar</h1>
            <h1>Diagnosa Penyakit ISPA</h1>
            <h2>(Infeksi Saluran Pernapasan Akut)</h2>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Apa itu ISPA?</h3>
                            <p style="text-align: justify">
                                Infeksi saluran pernapasan akut atau ISPA adalah infeksi yang terjadi di saluran pernapasan,
                                baik saluran pernapasan atas maupun bawah. Infeksi ini dapat menimbulkan gejala batuk,
                                pilek, dan demam. ISPA sangat mudah menular dan dapat dialami oleh siapa saja, terutama
                                anak-anak dan lansia.
                            </p>
                            {{-- <div class="text-center">
                                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="fa-regular fa-handshake"></i>
                                        <h4>Sistem Pakar Terpercaya</h4>
                                        <p style="text-align: start">Diagnosa kesehatan dapat diakses dengan mudah di
                                            website ini.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="fa-solid fa-city"></i>
                                        <h4>Kapan Saja, Di Mana Saja</h4>
                                        <p style="text-align: start">Semua layanan di website selalu ada 24 jam untukmu dan
                                            keluarga.</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        {{-- <i class="fa-solid fa-hands-holding-circle"></i> --}}
                                        <i class="fa-solid fa-shield-halved"></i>
                                        <h4>Mudah, Aman & Nyaman</h4>
                                        <p style="text-align: start">Layanan sistem pakar website siap penuhi kebutuhan
                                            kesehatanmu setiap saat.</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container-fluid">

                <div class="row">
                    <div
                        class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
                        <img src="{{ asset('frontend/images/img.png') }}" alt="second-hero">
                    </div>

                    <div
                        class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h3>Kebutuhan Sehatmu Hanya dengan Sentuhan Jari</h3>
                        <p>Akses layanan diagnosa penyakit laptop maupun smartphone. Manjadi lebih mudah dan praktis.</p>

                        <div class="icon-box">
                            <div class="icon">
                                <img src="{{ asset('frontend/images/medical-team.png') }}" alt="medical_teams"
                                    height="75">
                            </div>
                            <h4 class="title"><a href="">Tenaga Medis Berpengalaman</a></h4>
                            <p class="description">Sistem Pakar ini dikelola oleh beberapa tenaga medis berpengalaman di
                                bidangnya.</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon">
                                <img src="{{ asset('frontend/images/doctor-male.png') }}" alt="doctor-man" height="75">
                            </div>
                            <h4 class="title"><a href="">Dokter Pria</a></h4>
                            <p class="description">
                                Terdapat dokter pria yang dapat menjadikan konsultasi lebih nyaman dan privasi terjaga
                            </p>
                        </div>

                        <div class="icon-box">
                            <div class="icon">
                                <img src="{{ asset('frontend/images/doctor-female.png') }}" alt="doctor-woman"
                                    height="75">
                            </div>
                            <h4 class="title"><a href="">Dokter Wanita</a></h4>
                            <p class="description">
                                Terdapat dokter wanita yang dapat menjadikan konsultasi lebih nyaman dan privasi terjaga
                            </p>
                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Consult Now Section ======= -->
        <section id="counts" class="counts">
            <div class="container">
                <div class="row">
                    <div class="text-center">
                        <a href="{{ route('consult') }}" class="appointment-btn btn py-3" style="font-size: 20px">
                            <strong>Konsultasi Sekarang</strong>
                        </a>
                        {{-- <a href="#" class="appointment-btn"><span class="d-none d-md-inline">Masuk Panel</span></a> --}}
                    </div>
                </div>
            </div>
        </section><!-- End Consult Now Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="section-title">
                    <h2>Kirimkan Pesan Anda</h2>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <form action="#" method="post" role="form" class="php-email-form">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama"
                                    required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                    required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Subjek"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Kirim Pesan</button></div>
                    </form>


                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
