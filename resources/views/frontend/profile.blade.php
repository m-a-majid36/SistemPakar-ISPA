@extends('frontend.layouts.app')
@section('title', 'Profile')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css"
        integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Profile</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li>Profile</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs Section -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="section-title">
                    <h2>Profile</h2>
                </div>
                <div class="row">
                    <hr>
                    <form action="{{ route('home.profile.update') }}" method="POST" class="home-form">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-3">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" id="name" required
                                value="{{ old('name') ? old('name') : $user->name }}"
                                oninput="this.value = this.value.replace(/[^a-z A-Z]/g, '');"
                                class="mt-1 form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 mt-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" required
                                    value="{{ old('email') ? old('email') : $user->email }}"
                                    class="mt-1 form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label for="username">username</label>
                                <input type="text" name="username" id="username" required
                                    value="{{ old('username') ? old('username') : $user->username }}"
                                    oninput="this.value = this.value.replace(/[^0-9._a-z]/g, '');"
                                    class="mt-1 form-control @error('username') is-invalid @enderror">
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 mt-3">
                                <label for="phone">Nomor Telepon</label>
                                <input type="text" name="phone" id="phone" required minlength="8" maxlength="20"
                                    value="{{ old('phone') ? old('phone') : $user->phone }}"
                                    oninput="this.value = this.value.replace(/[^0-9+()]/g, '').replace(/(\+.?)\+.*/g, '$1');"
                                    class="mt-1 form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mt-3">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender"
                                    class="mt-1 form-control @error('gender') is-invalid @enderror">
                                    <option selected disabled>Pilih jenis kelamin</option>
                                    <option value="L"
                                        {{ old('gender') ? (old('gender') == 'L' ? 'selected' : '') : ($user->gender == 'L' ? 'selected' : '') }}>
                                        Laki-Laki</option>
                                    <option value="P"
                                        {{ old('gender') ? (old('gender') == 'P' ? 'selected' : '') : ($user->gender == 'P' ? 'selected' : '') }}>
                                        Perempuan</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label class="text-center mt-3">Alamat</label>
                            <div class="form-group col-md-6 mt-3">
                                <label for="province_id">Provinsi</label>
                                <select name="province_id" id="province_id" required
                                    class="mt-1 form-control @error('province_id') is-invalid @enderror">
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
                            <div class="form-group col-md-6 mt-3">
                                <label for="regency_id">Kota/Kabupaten</label>
                                <select name="regency_id" id="regency_id" required
                                    class="mt-1 form-control @error('regency_id') is-invalid @enderror">
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
                        <div class="row">
                            <div class="form-group col-md-6 mt-3">
                                <label for="district_id">Kecamatan</label>
                                <select name="district_id" id="district_id" required
                                    class="mt-1 form-control @error('district_id') is-invalid @enderror">
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
                            <div class="form-group col-md-6 mt-3">
                                <label for="village_id">Kelurahan/Desa</label>
                                <select name="village_id" id="village_id" required
                                    class="mt-1 form-control @error('village_id') is-invalid @enderror">
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
                        <div class="form-group mt-3">
                            <label for="address">Detail Alamat (Jl. No. RT/RW)</label>
                            <textarea name="address" id="address" required class="mt-1 form-control @error('address') is-invalid @enderror">{{ old('address') ? old('address') : $user->address }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn">Ubah Profile</button>
                        </div>
                    </form>
                    <hr class="mt-5">
                    <form action="{{ route('home.profile.password') }}" method="POST" class="home-form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-4 mt-3">
                                <label for="password_old">Password Lama</label>
                                <input type="password" name="password_old" id="password_old" required
                                    class="mt-1 form-control @error('password_old') @enderror">
                                @error('password_old')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 mt-3">
                                <label for="password_new">Password Baru</label>
                                <input type="password" name="password_new" id="password_new" required
                                    class="mt-1 form-control @error('password_new') @enderror">
                                @error('password_new')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 mt-3">
                                <label for="password_confirm">Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirm" id="password_confirm" required
                                    class="mt-1 form-control @error('password_confirm') @enderror">
                                @error('password_confirm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn">Ubah Password</button>
                        </div>
                    </form>
                    <hr class="mt-5">
                </div>
            </div>
        </section>
    </main>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
        integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                        url: "{{ route('home.get.regencies') }}",
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
                        url: "{{ route('home.get.districts') }}",
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
                        url: "{{ route('home.get.villages') }}",
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
