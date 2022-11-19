<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope"></i> <a href="mailto:ayundamitaaprilia@gmail.com">ayundamitaaprilia@gmail.com</a>
            <i class="bi bi-phone"></i> +62 822-2009-9116
        </div>
        <div class="d-none d-lg-flex social-links align-items-center">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/tulmitul/" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
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
                    <a class="nav-link {{ Request::is('/consult') ? 'active' : '' }}" href="{{ route('consult') }}">
                        Konsultasi
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('/info') ? 'active' : '' }}" href="{{ route('info') }}">
                        Informasi Penyakit
                    </a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="#" class="appointment-btn"><span class="d-none d-md-inline">Masuk Panel</span></a>

    </div>
</header><!-- End Header -->
