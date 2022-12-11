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
                                    <div class="row details order-2 order-lg-1">
                                        <h3>{{ $symptom->name }}</h3>
                                        <p class="fst-italic">{{ $symptom->description }}</p>
                                        <div class="col-lg-4">
                                            <h5 class="mb-0 pb-0">Gejala :</h5>
                                            <ul>
                                                @foreach ($symptom->diseases as $disease)
                                                    <li class="m-0 p-0">{{ $disease->name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-lg-4">
                                            <h5 class="mb-0 pb-0">Penyebab :</h5>
                                            <ul>
                                                @foreach ($symptom->reasons as $reason)
                                                    <li class="m-0 p-0">{{ $reason->name }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-lg-4">
                                            <h5 class="mb-0 pb-0">Perawatan :</h5>
                                            <ul>
                                                @foreach ($symptom->treatments as $treatment)
                                                    <li class="m-0 p-0">{{ $treatment->name }}</li>
                                                @endforeach
                                            </ul>
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
@section('script')
    <script></script>
@endsection
