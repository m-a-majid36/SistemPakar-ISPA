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
            <li class="nav-label">Data Master</li>
            @if (Auth::user()->role == 'dokter')
                <li class="{{ Request::is('dashboard/symptom*') ? 'active' : '' }}">
                    <a href="{{ route('symptom.index') }}" aria-expanded="false">
                        <i class="fa-solid fa-lungs-virus"></i><span class="nav-text">Penyakit</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/disease*') ? 'active' : '' }}">
                    <a href="{{ route('disease.index') }}" aria-expanded="false">
                        <i class="fa-solid fa-head-side-cough"></i><span class="nav-text">Gejala</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/reason*') ? 'active' : '' }}">
                    <a href="{{ route('reason.index') }}" aria-expanded="false">
                        <i class="fa-solid fa-square-virus"></i><span class="nav-text">Penyebab</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/treatment*') ? 'active' : '' }}">
                    <a href="{{ route('treatment.index') }}" aria-expanded="false">
                        <i class="fa-solid fa-prescription-bottle-medical"></i><span class="nav-text">Perawatan</span>
                    </a>
                </li>
                <li class="nav-label">Riwayat</li>
                <li class="{{ Request::is('dashboard/history*') ? 'active' : '' }}">
                    <a href="{{ route('history.index') }}" aria-expanded="false">
                        <i class="icon-book-open menu-icon"></i><span class="nav-text">Riwayat Pasien</span>
                    </a>
                </li>
            @elseif (Auth::user()->role == 'admin')
                <li class="{{ Request::is('dashboard/homesetting*') ? 'active' : '' }}">
                    <a href="{{ route('home.setting') }}" aria-expanded="false">
                        <i class="icon-home menu-icon"></i><span class="nav-text">Pengaturan Beranda</span>
                    </a>
                </li>
                <li class="{{ Request::is('dashboard/user*') ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}" aria-expanded="false">
                        <i class="icon-user menu-icon"></i><span class="nav-text">Pengaturan Pengguna</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 'dokter')
                <li class="nav-label">Pesan</li>
            @endif
            <li class="{{ Request::is('dashboard/message*') ? 'active' : '' }}">
                <a href="{{ route('message.index') }}" aria-expanded="false">
                    <i class="icon-speech menu-icon"></i><span class="nav-text">Pesan</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
