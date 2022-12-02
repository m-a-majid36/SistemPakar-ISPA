@extends('backend.layouts.app')
@section('title', 'Tambah Perawatan')
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('treatment.index') }}">Perawatan</a></li>
                <li class="breadcrumb-item active">Tambah Perawatan</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Tambah Perawatan</h3>
                        <a href="{{ route('treatment.index') }}" class="btn btn-info"><i
                                class="fas fa-angle-double-left"></i>&nbsp; {{ 'Kembali' }}</a>
                        <hr>
                        <form action="{{ route('treatment.store') }}" method="POST" class="basic-form">
                            @csrf
                            <div class="form-group">
                                <label for="name">Perawatan</label>
                                <input type="text" name="name" id="name" required placeholder="Perawatan"
                                    autofocus class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Tambah Perawatan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
