<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    @yield('meta')

    <title>Dashboard SP-ISPA | @yield('title')</title>
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/jpg" href="{{ url('frontend/images/medicteam.png') }}" />

    <!-- Pignose Calender -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/pg-calendar/css/pignose.calendar.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Chartist -->
    <link href="{{ asset('backend/plugins/chartist/css/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}"
        rel="stylesheet">

    <!-- Datatable -->
    <link href="{{ asset('backend/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">

    @yield('link')

</head>
