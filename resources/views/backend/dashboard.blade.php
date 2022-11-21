@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2 class="mb-4" style="color: #7571f9">Selamat datang, <span
                        style="color: #4a4f53">{{ Auth::user()->name }}</span>
                </h2>
                <div class="row">
                    @if (Auth::user()->role == 'admin')
                        <div class="col-lg-6 col-sm-6">
                            <div class="card gradient-4">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Total Pengguna Sistem</h3>
                                    <div class="d-inline-block">
                                        <h2 class="text-white">{{ $total_akun }} Akun</h2>
                                        <p class="text-white mb-0">Per tanggal {{ date('d-m-Y') }}</p>
                                    </div>
                                    <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="card gradient-2">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Total Pesan Masuk</h3>
                                    <div class="d-inline-block">
                                        <h2 class="text-white">{{ $total_pesan }} Pesan</h2>
                                        <p class="text-white mb-0">Per tanggal {{ date('d-m-Y') }}</p>
                                    </div>
                                    <span class="float-right display-5 opacity-5"><i class="fa-solid fa-message"></i></span>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-4 col-sm-6">
                            <div class="card gradient-3">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Jumlah Data Gejala</h3>
                                    <div class="d-inline-block">
                                        <h2 class="text-white">{{ $total_gejala }} Gejala</h2>
                                        <p class="text-white mb-0">Per tanggal {{ date('d-m-Y') }}</p>
                                    </div>
                                    <span class="float-right display-5 opacity-5"><i
                                            class="fa-solid fa-head-side-cough"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="card gradient-2">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Jumlah Data Penyakit</h3>
                                    <div class="d-inline-block">
                                        <h2 class="text-white">{{ $total_penyakit }} Penyakit</h2>
                                        <p class="text-white mb-0">Per tanggal {{ date('d-m-Y') }}</p>
                                    </div>
                                    <span class="float-right display-5 opacity-5"><i class="fa-solid fa-viruses"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="card gradient-1">
                                <div class="card-body">
                                    <h3 class="card-title text-white">Jumlah Data Riwayat Pasien</h3>
                                    <div class="d-inline-block">
                                        <h2 class="text-white">{{ $total_riwayat }} Riwayat</h2>
                                        <p class="text-white mb-0">Per tanggal {{ date('d-m-Y') }}</p>
                                    </div>
                                    <span class="float-right display-5 opacity-5"><i
                                            class="fa-solid fa-file-medical"></i></span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
@endsection
@section('script')

@endsection
