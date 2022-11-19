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

        <section class="inner-page">
            <div class="container">
                <p>
                    Isi
                </p>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
