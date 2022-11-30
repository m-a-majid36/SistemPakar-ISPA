<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Pakar ISPA | Register</title>
    <!-- Favicon icon -->
    <link href="{{ asset('frontend/images/doctors.png') }}" type="image/jpg">

    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
</head>

<body
    style="background: url('{{ Storage::url($data->main_picture) }}'); background-position: center; 
    background-repeat: no-repeat; background-size: cover; height: 100vh;">
    <!--Preloader start-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--Preloader end-->

    <div class="container">
        <div class="row vertical-center justify-content-center">
            <div class="col-xl-10">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a class="text-center" href="{{ route('home') }}">
                                <h2>Sistem Pakar ISPA</h2>
                            </a>
                            <h4 class="text-center">Registrasi</h4>
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span>
                                    </button><strong>Berhasil!</strong> {{ session('success') }}
                                </div>
                            @elseif (session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span>
                                    </button><strong>Gagal!</strong> {{ session('error') }}
                                </div>
                            @endif
                            <form class="basic-form mt-3" action="{{ route('register.action') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" required
                                        placeholder="Nama Lengkap" value="{{ old('name') }}"
                                        oninput="this.value = this.value.replace(/[^a-z A-Z]/g, '');"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" required placeholder="Email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" required
                                            placeholder="username" value="{{ old('username') }}"
                                            oninput="this.value = this.value.replace(/[^0-9._a-z]/g, '');"
                                            class="form-control @error('username') is-invalid @enderror">
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone">Nomor Telepon</label>
                                        <input type="text" name="phone" id="phone" required
                                            placeholder="Nomor Telepon" minlength="8" maxlength="20"
                                            value="{{ old('phone') }}"
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
                                            <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>
                                                Laki-Laki</option>
                                            <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
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
                                                <option value="{{ $province_id->id }}">{{ $province_id->name }}
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
                                        </select>
                                        @error('district_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="village_id">Kelurahan/Desa</label>
                                        <select name="village_id" id="village_id" required
                                            class="form-control @error('village_id') is-invalid @enderror">
                                        </select>
                                        @error('village_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Detail Alamat (Jl. No. RT/RW)</label>
                                    <textarea name="address" id="address" required class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password" name="password" id="password" required
                                            placeholder="Password"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Konfirmasi Password</label>
                                        <input type="password" name="password-confirm" id="password-confirm" required
                                            placeholder="Konfirmasi Password"
                                            class="form-control @error('password-confirm') is-invalid @enderror">
                                        @error('password-confirm')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn login-form__btn submit w-100">Registrasi</button>
                            </form>
                            <p class="mt-3 text-center login-form__footer">Sudah memiliki akun? <a
                                    href="{{ route('login') }}" class="text-primary">Login</a> sekarang</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('backend/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend/js/settings.js') }}"></script>
    <script src="{{ asset('backend/js/gleek.js') }}"></script>
    <script src="{{ asset('backend/js/styleSwitcher.js') }}"></script>

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
                        url: "{{ route('get.regencies') }}",
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
                        url: "{{ route('get.districts') }}",
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
                        url: "{{ route('get.villages') }}",
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
</body>

</html>
