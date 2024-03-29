@extends('backend.layouts.app')
@section('title', 'Penyakit')
@section('link')
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/css/toastr.min.css') }}">
@endsection
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Penyakit</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Data Penyakit</h3>
                        <a href="{{ route('symptom.create') }}" class="btn btn-success text-white"><i
                                class="fa-solid fa-file-circle-plus"></i>&nbsp; Tambah Penyakit</a>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="1">No.</th>
                                        <th width="90">Nama</th>
                                        <th>Deskripsi</th>
                                        <th class="text-center" width="1">Total Gejala</th>
                                        <th>Penyebab</th>
                                        <th>Perawatan</th>
                                        <th class="text-center" width="150">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($symptoms as $symptom)
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle">{{ $loop->iteration }}
                                            </th>
                                            <td>{{ $symptom->name }}</td>
                                            <td>{{ $symptom->description }}</td>
                                            <td
                                                class="text-center {{ $symptom->diseases->count() ? null : 'text-danger' }}">
                                                {{ $symptom->diseases->count() }}
                                            </td>
                                            <td>
                                                @if ($symptom->reasons->count())
                                                    <ul>
                                                        <hr class="my-2 p-0">
                                                        @foreach ($symptom->reasons as $reason)
                                                            <li>
                                                                {{ $reason->name }}
                                                                <hr class="my-2 p-0">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <div class="text-danger">Tidak ada penyebab</div>
                                                @endif

                                            </td>
                                            <td>
                                                @if ($symptom->treatments->count())
                                                    <ul>
                                                        <hr class="my-2 p-0">
                                                        @foreach ($symptom->treatments as $treatment)
                                                            <li>
                                                                {{ $treatment->name }}
                                                                <hr class="my-2 p-0">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <div class="text-danger">Tidak ada Perawatan</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('symptom.show', ['symptom' => encrypt($symptom->id)]) }}"
                                                    class="btn btn-info my-1"><i class="icon-eye"></i></a>
                                                <a href="{{ route('symptom.edit', ['symptom' => encrypt($symptom->id)]) }}"
                                                    class="btn btn-warning my-1 text-white"><i class="icon-note"></i></a>
                                                <button type="button" class="btn btn-danger my-1" data-toggle="modal"
                                                    data-target="#delete{{ $symptom->id }}"><i
                                                        class="icon-trash"></i></button>
                                            </td>
                                        </tr>
                                        @include('backend.doctor.symptom.modal')
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
