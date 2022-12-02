@extends('backend.layouts.app')
@section('title', 'Edit Penyakit')
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('symptom.index') }}">Penyakit</a></li>
                <li class="breadcrumb-item active">Edit Penyakit</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Edit Penyakit</h3>
                        <a href="{{ route('symptom.index') }}" class="btn btn-info"><i
                                class="fas fa-angle-double-left"></i>&nbsp; {{ 'Kembali' }}</a>
                        <hr>
                        <form class="basic-form" action="{{ route('symptom.update', ['symptom' => $symptom->id]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" required placeholder="Nama Penyakit"
                                    autofocus class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ? old('name') : $symptom->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea name="description" id="description" required placeholder="Deskripsi Penyakit"
                                    class="form-control @error('description') is-invalid @enderror">{{ old('description') ? old('description') : $symptom->description }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Ubah Penyakit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
