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
                        <h5 class="mt-3 card-title">Gejala :</h5>
                        <div class="basic-list-group">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">Cras justo
                                    odio <span class="input-group-text">14</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Dapibus ac
                                    facilisis in <span class="input-group-text">2</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Morbi leo
                                    risus <span class="input-group-text">1</span>
                                </li>
                            </ul>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h5 class="mt-3 card-title">Penyebab :</h5>
                                <div class="basic-list-group">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">Cras
                                            justoodio
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="mt-3 card-title">Perawatan :</h5>
                                <div class="basic-list-group">
                                    <ul class="list-group">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Crasjustoodio
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.doctor.symptom.modal')
@endsection
