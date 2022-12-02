<!--**********************************
    Nav header start
***********************************-->
<div class="nav-header">
    <div class="brand-logo">
        <a class="text-center" style="padding: 10px 1px 1px" href="/">
            <h2 class="brand-title mb-0" style="color: white">Sistem Pakar</h2>
            <h4 class="brand-title mb-0" style="color: wheat">Diagnosa Penyakit ISPA</h4>
        </a>
    </div>
</div>
<!--**********************************
    Nav header end
***********************************-->

<!--**********************************
    Header start
***********************************-->
<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" height="40"
                            width="40" alt="profile-picture">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li class="text-center">
                                    <h4 class="mb-0">{{ Auth::user()->name }}</h4>
                                </li>
                                <hr>
                                <li>
                                    <a href="{{ route('dashboard.profile') }}"><i class="icon-user"></i>
                                        <span>Profile</span></a>
                                </li>
                                <hr class="my-2">
                                <li>
                                    <a href="{{ route('logout') }}"><i class="icon-key"></i><span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--**********************************
    Header end ti-comment-alt
***********************************-->
