@extends('backend.layouts.app')
@section('title', 'Edit Data Pengguna')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Pengguna</a></li>
                <li class="breadcrumb-item active">Edit Data Pengguna</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Edit Data Pengguna</h3>
                        <a href="{{ route('user.index') }}" class="btn btn-info"><i
                                class="fas fa-angle-double-left"></i>&nbsp; {{ 'Kembali' }}</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#delete{{ $user->id }}"><i class="icon-trash"></i>&nbsp; Hapus</button>
                        <hr>
                        <form class="basic-form" action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" id="name" required placeholder="Nama Lengkap"
                                    oninput="this.value = this.value.replace(/[^a-z A-Z]/g, '');"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ? old('name') : $user->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" id="role"
                                    class="form-control @error('role') is-invalid @enderror">
                                    <option selected disabled>Pilih Role...</option>
                                    <option value="admin"
                                        {{ old('role') ? (old('role') == 'admin' ? 'selected' : '') : ($user->role == 'admin' ? 'selected' : '') }}>
                                        Admin
                                    </option>
                                    <option value="dokter"
                                        {{ old('role') ? (old('role') == 'dokter' ? 'selected' : '') : ($user->role == 'dokter' ? 'selected' : '') }}>
                                        Dokter
                                    </option>
                                    <option value="pasien"
                                        {{ old('role') ? (old('role') == 'pasien' ? 'selected' : '') : ($user->role == 'pasien' ? 'selected' : '') }}>
                                        Pasien
                                    </option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" required placeholder="Email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') ? old('email') : $user->email }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" required placeholder="username"
                                        oninput="this.value = this.value.replace(/[^0-9._a-z]/g, '');"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ old('username') ? old('username') : $user->username }}">
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="phone">Nomor Telepon</label>
                                    <input type="text" name="phone" id="phone" required placeholder="Nomor Telepon"
                                        minlength="8" maxlength="20"
                                        value="{{ old('phone') ? old('phone') : $user->phone }}"
                                        oninput="this.value = this.value.replace(/[^0-9+()]/g, '').replace(/(\+.?)\+.*/g, '$1');"
                                        class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" id="gender"
                                        class="form-control @error('gender') is-invalid @enderror">
                                        <option selected disabled>Pilih...</option>
                                        <option value="L"
                                            {{ old('gender') ? (old('gender') == 'L' ? 'selected' : '') : ($user->gender == 'L' ? 'selected' : '') }}>
                                            Laki-Laki
                                        </option>
                                        <option value="P"
                                            {{ old('gender') ? (old('gender') == 'P' ? 'selected' : '') : ($user->gender == 'P' ? 'selected' : '') }}>
                                            Perempuan
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="province_id">Provinsi</label>
                                    <select name="province_id" id="province_id" required
                                        class="form-control @error('province_id') is-invalid @enderror">
                                        <option selected disabled>Pilih Provinsi...</option>
                                        @foreach ($provinces as $province_id)
                                            <option value="{{ $province_id->id }}"
                                                {{ old('province_id') ? (old('province_id') == $province_id->id ? 'selected' : '') : ($user->province_id == $province_id->id ? 'selected' : '') }}>
                                                {{ $province_id->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="regency_id">Kota/Kabupaten</label>
                                    <select name="regency_id" id="regency_id" required
                                        class="form-control @error('regency_id') is-invalid @enderror">
                                        @foreach ($regencies as $regency_id)
                                            <option value="{{ $regency_id->id }}"
                                                {{ old('regency_id') ? (old('regency_id') == $regency_id->id ? 'selected' : '') : ($user->regency_id == $regency_id->id ? 'selected' : '') }}>
                                                {{ $regency_id->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('regency_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="district_id">Kecamatan</label>
                                    <select name="district_id" id="district_id" required
                                        class="form-control @error('district_id') is-invalid @enderror">
                                        @foreach ($districts as $district_id)
                                            <option value="{{ $district_id->id }}"
                                                {{ old('district_id') ? (old('district_id') == $district_id ? 'selected' : '') : ($user->district_id == $district_id->id ? 'selected' : '') }}>
                                                {{ $district_id->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="village_id">Kelurahan/Desa</label>
                                    <select name="village_id" id="village_id" required
                                        class="form-control @error('village_id') is-invalid @enderror">
                                        @foreach ($villages as $village_id)
                                            <option value="{{ $village_id->id }}"
                                                {{ old('village_id') ? (old('village_id') == $village_id ? 'selected' : '') : ($user->village_id == $village_id->id ? 'selected' : '') }}>
                                                {{ $village_id->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('village_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Detail Alamat (Jl. No. RT/RW)</label>
                                <textarea name="address" id="address" required class="form-control @error('address') is-invalid @enderror">{{ old('address') ? old('address') : $user->address }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Edit Data Pengguna</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.admin.user.modal')
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(function() {
                $('#province_id').on('change', function() {
                    let id_province = $('#province_id').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('user.get.regencies') }}",
                        data: {
                            id_province: id_province
                        },
                        cache: false,

                        success: function(msg) {
                            $('#regency_id').html(msg);
                            $('#district_id').html('');
                            $('#village_id').html('');
                        },
                        error: function(data) {
                            console.log('error:', data);
                        },
                    });
                });
                $('#regency_id').on('change', function() {
                    let id_regency = $('#regency_id').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('user.get.districts') }}",
                        data: {
                            id_regency: id_regency
                        },
                        cache: false,

                        success: function(msg) {
                            $('#district_id').html(msg);
                            $('#village_id').html('');
                        },
                        error: function(data) {
                            console.log('error:', data);
                        },
                    });
                });
                $('#district_id').on('change', function() {
                    let id_district = $('#district_id').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('user.get.villages') }}",
                        data: {
                            id_district: id_district
                        },
                        cache: false,

                        success: function(msg) {
                            $('#village_id').html(msg);
                        },
                        error: function(data) {
                            console.log('error:', data);
                        },
                    });
                });
            });
        });
    </script>
@endsection
