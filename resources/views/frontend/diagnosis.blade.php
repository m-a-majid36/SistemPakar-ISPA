@extends('frontend.layouts.app')
@section('title', 'Konsultasi')
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Diagnosa Penyakit ISPA</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li>Diagnosa</li>
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
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2">
                                    <h5>Nama</h5>
                                </div>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <p>{{ Auth::user()->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2">
                                    <h5>Email</h5>
                                </div>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2">
                                    <h5>Nomor Telepon</h5>
                                </div>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <p>{{ Auth::user()->phone }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2">
                                    <h5>Jenis Kelamin</h5>
                                </div>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    @if (Auth::user()->gender == 'L')
                                        <p>Laki-laki</p>
                                    @elseif (Auth::user()->gender == 'P')
                                        <p>Perempuan</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2">
                                    <h5>Provinsi</h5>
                                </div>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <p>{{ ucwords(strtolower(Auth::user()->province->name)) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2">
                                    <h5>Kota</h5>
                                </div>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <p>{{ ucwords(strtolower(Auth::user()->regency->name)) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2">
                                    <h5>Kecamatan</h5>
                                </div>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <p>{{ ucwords(strtolower(Auth::user()->district->name)) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2">
                                    <h5>Desa</h5>
                                </div>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <p>{{ ucwords(strtolower(Auth::user()->village->name)) }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-lg-2">
                                    <h5>Alamat</h5>
                                </div>
                                <div class="col-sm-8 col-md-9 col-lg-10">
                                    <p>{{ Auth::user()->address }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="section-title">
                            <h4 class="mt-3">Riwayat Diagnosa</h4>
                            <a href="{{ route('diagnosis.create') }}" class="mt-3 btn btn-success"><i
                                    class="fa-solid fa-plus"></i>&nbsp; Tambah Diagnosa</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr class="text-center" style="vertical-align: middle">
                                        <th width="1">No.</th>
                                        <th>Tanggal Diagnosa</th>
                                        <th>Gejala</th>
                                        <th>Penyakit Hasil Diagnosa</th>
                                    </tr>
                                </thead>
                                @if ($histories->count())
                                    <tbody>
                                        @foreach ($histories as $history)
                                            <tr>
                                                <th class="text-center" style="vertical-align: middle">
                                                    {{ $loop->iteration }}
                                                </th>
                                                <td class="text-center" style="vertical-align: middle">
                                                    {{ date('d-m-Y', strtotime($history->created_at)) }}
                                                </td>
                                                <td>
                                                    <ul>
                                                        <hr class="my-2 p-0">
                                                        @foreach ($history->diseases as $disease)
                                                            <li>
                                                                {{ $disease->name }}
                                                                <hr class="my-2 p-0">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td class="text-center" style="vertical-align: middle">
                                                    <strong>{{ $history->symptom->name }}</strong>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                            @if (!$histories->count())
                                <table class="table table-bordered" style="margin-top: -17px">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                Tidak ada Data
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            @endif
                        </div>
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
@section('script')
    <script src="{{ asset('backend/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/toastr/js/toastr.init.js') }}"></script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @elseif (Session::has('error'))
            toastr.error("{{ Session::get('error') }}")
        @endif
    </script>
@endsection
