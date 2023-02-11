@extends('frontend.layouts.app')
@section('title', 'Tambah Diagnosa')
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Tambah Diagnosa Penyakit ISPA</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('diagnosis') }}">Diagnosa</a></li>
                        <li>Tambah Diagnosa</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs Section -->
        <section class="inner-page">
            <div class="container">
                <div class="section-title">
                    <h2 class="mb-0">Pilih Gejala<br>Yang Dirasakan</h2>
                </div>
                <div class="row">
                    <form action="{{ route('diagnosis.store') }}" class="select-form" method="POST">
                        @csrf
                        <div class="row">
                            @foreach ($diseases as $disease)
                                <div class="inputGroup col-md-6">
                                    <input type="checkbox" value="{{ $disease->id }}" name="disease[{{ $disease->id }}]"
                                        id="disease[{{ $disease->id }}]" class="disease-enable">
                                    <label for="disease[{{ $disease->id }}]">{{ $disease->name }}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" id="btn" disabled class="btn">Masukkan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('script')
    <script>
        $(".disease-enable").on('change', function() {
            $(".btn").prop('disabled', !$(".disease-enable:checked").length);
        })
    </script>
@endsection
