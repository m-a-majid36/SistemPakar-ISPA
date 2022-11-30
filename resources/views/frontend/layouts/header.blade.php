<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope"></i> <a href="mailto:{{ $data->email }}">{{ $data->email }}</a>
            <i class="bi bi-phone"></i>{{ $data->phone }}
        </div>
        <div class="d-none d-lg-flex social-links align-items-center">
            @if ($data->twitter)
                <a href="{{ $data->twitter }}" class="twitter"><i class="bi bi-twitter"></i></a>
            @endif
            @if ($data->facebook)
                <a href="{{ $data->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
            @endif
            @if ($data->instagram)
                <a href="{{ $data->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
            @endif
            @if ($data->linkedin)
                <a href="{{ $data->linkedin }}" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            @endif
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="index.html">Layanan Diagnosa Penyakit ISPA</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li>
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('consult*') ? 'active' : '' }}" href="{{ route('consult') }}">
                        Konsultasi
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('info*') ? 'active' : '' }}" href="{{ route('info') }}">
                        Informasi Penyakit
                    </a>
                </li>
                <li class="dropdown"><a href="#"><span>Menu</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @if (Auth::user())
                            <li>
                                <a href="{{ route('profile') }}"><span>Profile</span></a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"><span>Logout</span></a>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        @if (!Auth::user())
            <a href="{{ route('login') }}" class="appointment-btn"><span class="d-none d-md-inline">Masuk
                    Panel</span></a>
        @endif

    </div>
</header><!-- End Header -->
