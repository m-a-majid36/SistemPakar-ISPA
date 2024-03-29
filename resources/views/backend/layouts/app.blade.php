<!DOCTYPE html>
<html lang="en">
@include('backend.layouts.head')

<body>
    @include('backend.layouts.preloader')

    <div id="main-wrapper">
        @include('backend.layouts.navbar')
        @include('backend.layouts.sidebar')

        <div class="content-body">
            @yield('content')
        </div>

        @include('backend.layouts.footer')
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('backend/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend/js/settings.js') }}"></script>
    <script src="{{ asset('backend/js/gleek.js') }}"></script>
    <script src="{{ asset('backend/js/styleSwitcher.js') }}"></script>

    <!-- Chartjs -->
    <script src="{{ asset('backend/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Circle progress -->
    <script src="{{ asset('backend/plugins/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Pignose Calender -->
    <script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('backend/js/dashboard/dashboard-1.js') }}"></script>

    @yield('script')
</body>

</html>
