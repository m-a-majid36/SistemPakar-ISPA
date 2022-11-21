@extends('backend.layouts.app')
@section('title', 'Detail Data Pengguna')
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Pengguna</a></li>
                <li class="breadcrumb-item active">Detail Data Pengguna</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Detail Data Pengguna</h3>
                        <a href="{{ route('user.index') }}" class="btn btn-info"><i
                                class="fas fa-angle-double-left"></i>&nbsp; {{ 'Kembali' }}</a>
                        <a href="{{ route('user.edit', ['user' => encrypt($user->id)]) }}"
                            class="btn btn-warning text-white"><i class="icon-note"></i>&nbsp; Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#delete{{ $user->id }}"><i class="icon-trash"></i>&nbsp; Hapus</button>
                        <hr>
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
                                    <th width="150">Role</th>
                                    <td>
                                        @if ($user->role == 'admin')
                                            <i class="fa fa-circle-o text-info mr-2"></i> Admin
                                        @elseif ($user->role == 'dokter')
                                            <i class="fa fa-circle-o text-success mr-2"></i> Dokter
                                        @elseif ($user->role == 'pasien')
                                            <i class="fa fa-circle-o text-warning mr-2"></i> Pasien
                                        @endif
                                    </td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.admin.user.modal')
@endsection
@section('script')

@endsection
