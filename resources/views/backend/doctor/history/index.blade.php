@extends('backend.layouts.app')
@section('title', 'Riwayat')
@section('link')
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/css/toastr.min.css') }}">
@endsection
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Riwayat</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Data Riwayat Diagnosa</h3>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="1">No.</th>
                                        <th>Nama Pasien</th>
                                        <th>No. Telepon</th>
                                        <th>Gejala yang Dialami</th>
                                        <th class="text-center">Diagnosa Penyakit</th>
                                        <th class="text-center" width="100">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($histories as $history)
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle">{{ $loop->iteration }}
                                            </th>
                                            <td>{{ $history->user->name }}</td>
                                            <td>
                                                @if ($history->user->phone)
                                                    {{ $history->user->phone }}
                                                @else
                                                    -
                                                @endif
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
                                            <td class="text-center">
                                                <span class="label gradient-1 rounded">
                                                    <strong>{{ $history->symptom->name }}</strong>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('history.show', ['history' => encrypt($history->user->id)]) }}"
                                                    class="btn btn-info my-1"><i class="icon-eye"></i></a>
                                                <button type="button" class="btn btn-danger my-1" data-toggle="modal"
                                                    data-target="#delete{{ $history->id }}"><i
                                                        class="icon-trash"></i></button>
                                            </td>
                                        </tr>
                                        @include('backend.doctor.history.modal')
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
