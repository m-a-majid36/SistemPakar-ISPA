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
                @if (Auth::user())
                    @if (Auth::user()->role == 'pasien')
                    @else
                        <div class="row text-center">
                            <h1>Diagnosa hanya untuk <strong>Pasien</strong></h1>
                        </div>
                    @endif
                @else
                    <div class="row text-center">
                        <h1>Silahkan <a class="text-primary" href="{{ route('login') }}">Login</a> terlebih dahulu</h1>
                    </div>
                @endif
            </div>
        </section>

    </main><!-- End #main -->
@endsection
