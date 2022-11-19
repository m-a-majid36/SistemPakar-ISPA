@extends('frontend.layouts.app')
@section('title', 'Home')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center"
        style="background: url('{{ Storage::url($data->main_picture) }}'); background-repeat: no-repeat;">
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
                            <h3>{{ $data->main_title }}</h3>
                            <p style="text-align: justify">{{ $data->main_subtitle }}</p>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="fa-regular fa-handshake"></i>
                                        <h4>{{ $data->title1 }}</h4>
                                        <p style="text-align: start">{{ $data->subtitle1 }}</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="fa-solid fa-city"></i>
                                        <h4>{{ $data->title2 }}</h4>
                                        <p style="text-align: start">{{ $data->subtitle2 }}</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        {{-- <i class="fa-solid fa-hands-holding-circle"></i> --}}
                                        <i class="fa-solid fa-shield-halved"></i>
                                        <h4>{{ $data->title3 }}</h4>
                                        <p style="text-align: start">{{ $data->subtitle3 }}</p>
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
                        <img src="{{ Storage::url($data->second_picture) }}" alt="second-picture">
                    </div>

                    <div
                        class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                        <h3>{{ $data->second_title }}</h3>
                        <p>{{ $data->second_subtitle }}</p>

                        <div class="icon-box">
                            <div class="icon">
                                <img src="{{ Storage::url($data->content1_picture) }}" alt="content1_picture"
                                    height="75">
                            </div>
                            <h4 class="title">{{ $data->content1_title }}</h4>
                            <p class="description">{{ $data->content1_subtitle }}</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon">
                                <img src="{{ Storage::url($data->content2_picture) }}" alt="content2_picture"
                                    height="75">
                            </div>
                            <h4 class="title">{{ $data->content2_title }}</h4>
                            <p class="description">{{ $data->content2_subtitle }}</p>
                        </div>

                        <div class="icon-box">
                            <div class="icon">
                                <img src="{{ Storage::url($data->content3_picture) }}" alt="content3_picture"
                                    height="75">
                            </div>
                            <h4 class="title">{{ $data->content3_title }}</h4>
                            <p class="description">{{ $data->content3_subtitle }}</p>
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
