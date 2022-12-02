@extends('backend.layouts.app')
@section('title', 'Profile')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('link')
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/css/toastr.min.css') }}">
@endsection
@section('content')
    <!-- Breadcrumb -->
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Edit Profile</h3>
                        <hr>
                        <form class="basic-form" action="{{ route('dashboard.profile.update') }}" method="POST">
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
                                <button type="submit" class="btn btn-primary">Ubah Profile</button>
                            </div>
                        </form>
                        <hr class="mt-5">
                        <form class="mt-5 basic-form" action="{{ route('dashboard.profile.password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="password_old">Password Lama</label>
                                    <input type="password" name="password_old" id="password_old" required
                                        class="form-control @error('password_old') is-invalid @enderror">
                                    @error('password_old')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="password_new">Password Baru</label>
                                    <input type="password" name="password_new" id="password_new" required
                                        class="form-control @error('password_new') is-invalid @enderror">
                                    @error('password_new')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="password_confirm">Konfirmasi Password</label>
                                    <input type="password" name="password_confirm" id="password_confirm" required
                                        class="form-control @error('password_confirm') is-invalid @enderror">
                                    @error('password_confirm')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ubah Password</button>
                            </div>
                        </form>
                        <hr class="mt-5">
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
        @elseif (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}")
        @endif
    </script>
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
                        url: "{{ route('dashboard.get.regencies') }}",
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
                        url: "{{ route('dashboard.get.districts') }}",
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
                        url: "{{ route('dashboard.get.villages') }}",
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
