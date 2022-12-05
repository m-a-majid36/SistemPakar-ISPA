@extends('backend.layouts.app')
@section('title', 'Detail Penyakit')
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('symptom.index') }}">Penyakit</a></li>
                <li class="breadcrumb-item active">Detail Penyakit</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $symptom->name }}</h3>
                        <a href="{{ route('symptom.index') }}" class="btn btn-info"><i
                                class="fas fa-angle-double-left"></i>&nbsp; {{ 'Kembali' }}</a>
                        <a href="{{ route('symptom.edit', ['symptom' => encrypt($symptom->id)]) }}"
                            class="btn btn-warning text-white"><i class="icon-note"></i>&nbsp; {{ 'Edit' }}</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#delete{{ $symptom->id }}"><i class="icon-trash"></i>&nbsp;
                            {{ 'Hapus' }}</button>
                        <hr>
                        <h5>{{ $symptom->description }}</h5>
                        <hr>
                        <h5 class="mt-3 card-title">Gejala :@if (!$symptom->diseases->count())
                                <strong class="text-danger">Tidak ada gejala</strong>
                            @endif
                        </h5>
                        @if ($symptom->diseases->count())
                            <div class="basic-list-group">
                                <ul class="list-group">
                                    @foreach ($symptom->diseases as $disease)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $disease->name }}<span
                                                class="input-group-text">{{ $disease->pivot->score }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h5 class="mt-3 card-title">Penyebab :@if (!$symptom->reasons->count())
                                        <strong class="text-danger">Tidak ada penyebab</strong>
                                    @endif
                                </h5>
                                @if ($symptom->reasons->count())
                                    <div class="basic-list-group">
                                        <ul class="list-group">
                                            @foreach ($symptom->reasons as $reason)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{ $reason->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h5 class="mt-3 card-title">Perawatan :@if (!$symptom->treatments->count())
                                        <strong class="text-danger">Tidak ada perawatan</strong>
                                    @endif
                                </h5>
                                @if ($symptom->treatments->count())
                                    <div class="basic-list-group">
                                        <ul class="list-group">
                                            @foreach ($symptom->treatments as $treatment)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{ $treatment->name }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.doctor.symptom.modal')
@endsection
