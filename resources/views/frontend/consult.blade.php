@extends('frontend.layouts.app')
@section('title', 'Konsultasi')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Konsultasi Diagnosa Penyakit ISPA</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li>Konsultasi Diagnosa Penyakit ISPA</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">
                <div class="section-title">
                    <h2>Sistem Pakar<br>Diagnosa Penyakit ISPA</h2>
                </div>
                <div class="row text-center">
                    @if (Auth::user())
                    @else
                        <div class="row" style="padding-top: 150px">
                            <span class="appointment-btn">
                                <h1>Silahkan <a class="text-info" href="{{ route('login') }}">Login</a> terlebih dahulu
                                </h1>
                            </span>
                        </div>
                    @endif
                </div>

            </div>
        </section>

    </main><!-- End #main -->
@endsection
