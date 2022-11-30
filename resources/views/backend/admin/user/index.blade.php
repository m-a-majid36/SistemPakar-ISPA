@extends('backend.layouts.app')
@section('title', 'Pengguna')
@section('link')
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/css/toastr.min.css') }}">
@endsection
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Pengguna</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Data Pengguna</h3>
                        <a href="{{ route('user.create') }}" class="btn btn-success text-white"><i
                                class="icon-user-follow"></i>&nbsp; Tambah Pengguna</a>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="1">No.</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th>No. Telepon</th>
                                        <th class="text-center" width="210">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle">{{ $loop->iteration }}
                                            </th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->role == 'admin')
                                                    <i class="fa fa-circle-o text-info mr-2"></i> Admin
                                                @elseif ($user->role == 'dokter')
                                                    <i class="fa fa-circle-o text-success mr-2"></i> Dokter
                                                @elseif ($user->role == 'pasien')
                                                    <i class="fa fa-circle-o text-warning mr-2"></i> Pasien
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($user->gender == 'L')
                                                    <span class="label gradient-1 rounded">Laki-Laki</span>
                                                @elseif ($user->gender == 'P')
                                                    <span class="label gradient-2 rounded">Perempuan</span>
                                                @endif
                                            </td>
                                            <td>{{ $user->phone }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('user.show', ['user' => encrypt($user->id)]) }}"
                                                    class="btn btn-info my-1"><i class="icon-eye"></i></a>
                                                <button type="button" class="btn btn-secondary my-1 text-white"
                                                    data-toggle="modal" data-target="#reset{{ $user->id }}"><i
                                                        class="icon-refresh"></i></button>
                                                <a href="{{ route('user.edit', ['user' => encrypt($user->id)]) }}"
                                                    class="btn btn-warning my-1 text-white"><i class="icon-note"></i></a>
                                                <button type="button" class="btn btn-danger my-1" data-toggle="modal"
                                                    data-target="#delete{{ $user->id }}"><i
                                                        class="icon-trash"></i></button>
                                            </td>
                                        </tr>
                                        @include('backend.admin.user.modal')
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
