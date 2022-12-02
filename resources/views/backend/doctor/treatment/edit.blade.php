@extends('backend.layouts.app')
@section('title', 'Edit Perawatan')
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('treatment.index') }}">Perawatan</a></li>
                <li class="breadcrumb-item active">Edit Perawatan</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Edit Perawatan</h3>
                        <a href="{{ route('treatment.index') }}" class="btn btn-info"><i
                                class="fas fa-angle-double-left"></i>&nbsp; {{ 'Kembali' }}</a>
                        <hr>
                        <form action="{{ route('treatment.update', ['treatment' => $treatment->id]) }}" method="POST"
                            class="basic-form">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Perawatan</label>
                                <input type="text" name="name" id="name" required placeholder="Perawatan"
                                    autofocus class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ? old('name') : $treatment->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Ubah Perawatan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
