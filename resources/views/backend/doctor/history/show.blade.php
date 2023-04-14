@extends('backend.layouts.app')
@section('title', 'Detail Riwayat Diagnosa')
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('history.index') }}">Riwayat</a></li>
                <li class="breadcrumb-item active">Detail Riwayat Diagnosa</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Detail Riwayat Diagnosa</h3>
                        <a href="{{ route('history.index') }}" class="btn btn-info"><i
                                class="fas fa-angle-double-left"></i>&nbsp; {{ 'Kembali' }}
                        </a>
                        <hr>
                        <h5>Detail Data Pasien</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th width="150">Nama Lengkap</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th width="150">Username</th>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <th width="150">Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th width="150">Nomor Telepon</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th width="150">Jenis Kelamin</th>
                                    <td>
                                        @if ($user->gender == 'L')
                                            <span class="label gradient-1 rounded">Laki-Laki</span>
                                        @elseif ($user->gender == 'P')
                                            <span class="label gradient-2 rounded">Perempuan</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th width="150">Provinsi</th>
                                    <td>{{ $user->province->name }}</td>
                                </tr>
                                <tr>
                                    <th width="150">Kabupaten/Kota</th>
                                    <td>{{ $user->regency->name }}</td>
                                </tr>
                                <tr>
                                    <th width="150">Kecamatan</th>
                                    <td>{{ $user->district->name }}</td>
                                </tr>
                                <tr>
                                    <th width="150">Kelurahan/Desa</th>
                                    <td>{{ $user->village->name }}</td>
                                </tr>
                                <tr>
                                    <th width="150">Alamat</th>
                                    <td>{{ $user->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <h5>Riwayat Diagnosa</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr class="text-center">
                                        <th width="1">No.</th>
                                        <th>Tanggal Diagnosa</th>
                                        <th>Gejala yang dialami</th>
                                        <th>Diagnosa Penyakit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($histories as $history)
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle">{{ $loop->iteration }}
                                            </th>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ date('d-m-Y', strtotime($history->created_at)) }}
                                            </td>
                                            <td style="vertical-align: middle">
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
                                            <td class="text-center">
                                                <span class="label gradient-1 rounded">
                                                    <strong>{{ $history->symptom->name }}</strong>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
