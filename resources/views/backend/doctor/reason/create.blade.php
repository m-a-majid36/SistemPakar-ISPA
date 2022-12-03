@extends('backend.layouts.app')
@section('title', 'Tambah Penyebab')
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('reason.index') }}">Penyebab</a></li>
                <li class="breadcrumb-item active">Tambah Penyebab</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Tambah Penyebab</h3>
                        <a href="{{ route('reason.index') }}" class="btn btn-info"><i
                                class="fas fa-angle-double-left"></i>&nbsp; {{ 'Kembali' }}</a>
                        <hr>
                        <form action="{{ route('reason.store') }}" method="POST" class="basic-form">
                            @csrf
                            <div class="form-group">
                                <label for="name">
                                    <h5>Penyebab</h5>
                                </label>
                                <input type="text" name="name" id="name" required placeholder="Penyebab"
                                    autofocus class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">
                                    <h5>Kategori</h5>
                                </label>
                                <select name="category" id="category" required
                                    class="form-control @error('category') is-invalid @enderror">
                                    <option selected disabled>Pilih Kategori</option>
                                    <option value="B" {{ old('category') == 'B' ? 'selected' : '' }}>Bakteri</option>
                                    <option value="V" {{ old('category') == 'V' ? 'selected' : '' }}>Virus</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Tambah Penyebab</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
