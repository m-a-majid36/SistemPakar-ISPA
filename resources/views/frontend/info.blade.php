@extends('frontend.layouts.app')
@section('title', 'Informasi')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Informasi Penyakit ISPA</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li>Informasi Penyakit ISPA</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <!-- ======= Departments Section ======= -->
        <section id="departments" class="departments">
            <div class="container">

                <div class="section-title">
                    <h2>Penyakit ISPA</h2>
                    <p>{{ $data->main_subtitle }}</p>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-3">
                        <ul class="nav nav-tabs flex-column">
                            @foreach ($symptoms as $symptom)
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab"
                                        href="#tab-{{ $symptom->id }}">{{ $symptom->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content">
                            @foreach ($symptoms as $symptom)
                                <div class="tab-pane" id="tab-{{ $symptom->id }}">
                                    <div class="row gy-4">
                                        <div class="col-lg-8 details order-2 order-lg-1">
                                            <h3>{{ $symptom->name }}</h3>
                                            <p class="fst-italic">{{ $symptom->description }}</p>
                                            <p> Gejala
                                                Gejala
                                                Gejala
                                                Gejala
                                            </p>
                                        </div>
                                        <div class="col-lg-4 text-center order-1 order-lg-2">
                                            <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Departments Section -->

    </main><!-- End #main -->
@endsection
