@extends('backend.layouts.app')
@section('title', 'Perawatan')
@section('link')
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/css/toastr.min.css') }}">
@endsection
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Perawatan</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Data Perawatan</h3>
                        <a href="{{ route('treatment.create') }}" class="btn btn-success text-white"><i
                                class="fa-solid fa-file-circle-plus"></i>&nbsp; Tambah Perawatan</a>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <th class="text-center" width="1">No.</th>
                                    <th>Nama Perawatan</th>
                                    <th class="text-center" width="100">Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($treatments as $treatment)
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle">{{ $loop->iteration }}
                                            </th>
                                            <td>{{ $treatment->name }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('treatment.edit', ['treatment' => encrypt($treatment->id)]) }}"
                                                    class="btn btn-warning my-1 text-white"><i class="icon-note"></i></a>
                                                <button type="button" class="btn btn-danger my-1" data-toggle="modal"
                                                    data-target="#delete{{ $treatment->id }}"><i
                                                        class="icon-trash"></i></button>
                                            </td>
                                        </tr>
                                        @include('backend.doctor.treatment.modal')
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
