@extends('backend.layouts.app')
@section('title', 'Edit Penyebab')
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('reason.index') }}">Penyebab</a></li>
                <li class="breadcrumb-item active">Edit Penyebab</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Edit Penyebab</h3>
                        <a href="{{ route('reason.index') }}" class="btn btn-info"><i
                                class="fas fa-angle-double-left"></i>&nbsp; {{ 'Kembali' }}</a>
                        <hr>
                        <form action="{{ route('reason.update', ['reason' => $reason->id]) }}" method="POST"
                            class="basic-form">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Penyebab</label>
                                <input type="text" name="name" id="name" required placeholder="Penyebab"
                                    autofocus class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ? old('name') : $reason->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Kategori</label>
                                <select name="category" id="category" required
                                    class="form-control @error('category') is-invalid @enderror">
                                    <option selected disabled>Pilih Kategori</option>
                                    <option value="B"
                                        {{ old('category') ? (old('category') == 'B' ? 'selected' : '') : ($reason->category == 'B' ? 'selected' : '') }}>
                                        Bakteri</option>
                                    <option value="V"
                                        {{ old('category') ? (old('category') == 'V' ? 'selected' : '') : ($reason->category == 'V' ? 'selected' : '') }}>
                                        Virus</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Ubah Penyebab</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
