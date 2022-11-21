<!--**********************************
    Sidebar start
***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="icon-screen-desktop menu-icon"></i><span class="nav-text">Beranda</span>
                </a>
            </li>
            @if (Auth::user()->role == 'admin')
                <li class="nav-label">Data Master</li>
                <li class="{{ Request::is('dashboard/homesetting*') ? 'active' : '' }}">
                    <a href="{{ route('home.setting') }}" aria-expanded="false">
                        <i class="icon-home menu-icon"></i><span class="nav-text">Pengaturan Home</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/user*') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" aria-expanded="false">
                        <i class="icon-user menu-icon"></i><span class="nav-text">Pengaturan Pengguna</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/message*') ? 'active' : '' }}">
                    <a href="{{ route('message.index') }}" aria-expanded="false">
                        <i class="icon-speech menu-icon"></i><span class="nav-text">Pesan</span>
                    </a>
                </li>
            @else
                <li class="nav-label">Data Master</li>
                <li>
                    <a href="#" aria-expanded="false">
                        <i class="icon-list menu-icon"></i><span class="nav-text">Gejala</span>
                    </a>
                </li>
                <li>
                    <a href="#" aria-expanded="false">
                        <i class="icon-notebook menu-icon"></i><span class="nav-text">Penyakit</span>
                    </a>
                </li>
                <li>
                    <a href="#" aria-expanded="false">
                        <i class="icon-chemistry menu-icon"></i><span class="nav-text">Bobot Gejala-Penyakit</span>
                    </a>
                </li>
                <li class="nav-label">Riwayat</li>
                <li>
                    <a href="#" aria-expanded="false">
                        <i class="icon-book-open menu-icon"></i><span class="nav-text">Riwayat Pasien</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
