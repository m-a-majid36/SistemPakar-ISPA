<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pakar ISPA | Login</title>
    <!-- Favicon icon -->
    <link href="{{ asset('frontend/images/doctors.png') }}" type="image/png">

    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">

    <!-- Toastr -->
    <link href="{{ asset('backend/plugins/toastr/css/toastr.min.css') }}" rel="stylesheet">
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
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a class="text-center" href="{{ route('home') }}">
                                <h2>Sistem Pakar ISPA</h2>
                            </a>
                            <h4 class="text-center">Login</h4>
                            <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('login.action') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="login" id="login" placeholder="Email/Username"
                                        required class="form-control @error('login') is-invalid @enderror">
                                    @error('login')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" placeholder="Password"
                                        required class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn login-form__btn submit w-100">Sign In</button>
                            </form>
                            <p class="mt-3 text-center login-form__footer">Tidak memiliki akun? <a
                                    href="{{ route('register') }}" class="text-primary">Daftar</a> sekarang</p>
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

    <!-- Toastr -->
    <script src="{{ asset('backend/plugins/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/toastr/js/toastr.init.js') }}"></script>
    @if (session()->has('success'))
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.success({{ session('success') }}, "Berhasil", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
            });
        </script>
    @elseif (session()->has('error'))
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.error({{ session('error') }}, "Gagal", {
                    positionClass: "toast-bottom-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
            })
        </script>
    @endif
</body>

</html>
