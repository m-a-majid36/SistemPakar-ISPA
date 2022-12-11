@extends('backend.layouts.app')
@section('title', 'Penyebab')
@section('link')
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/css/toastr.min.css') }}">
@endsection
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Penyebab</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Data Penyebab</h3>
                        <a href="{{ route('reason.create') }}" class="btn btn-success text-white"><i
                                class="fa-solid fa-file-circle-plus"></i>&nbsp; Tambah Penyebab</a>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <th class="text-center" width="1">No.</th>
                                    <th>Penyebab</th>
                                    <th class="text-center" width="100">Kategori</th>
                                    <th class="text-center" width="100">Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($reasons as $reason)
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle">{{ $loop->iteration }}
                                            </th>
                                            <td>{{ $reason->name }}</td>
                                            <td class="text-center">
                                                @if ($reason->category == 'B')
                                                    <span class="label gradient-6 text-white rounded">Bakteri</span>
                                                @elseif ($reason->category == 'V')
                                                    <span class="label gradient-7 rounded">Virus</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('reason.edit', ['reason' => encrypt($reason->id)]) }}"
                                                    class="btn btn-warning my-1 text-white"><i class="icon-note"></i></a>
                                                <button type="button" class="btn btn-danger my-1" data-toggle="modal"
                                                    data-target="#delete{{ $reason->id }}"><i
                                                        class="icon-trash"></i></button>
                                            </td>
                                        </tr>
                                        @include('backend.doctor.reason.modal')
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
