<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BookPedia Admin</title>

        <!-- Favicon -->
        <link href="{{ asset('landingpage/img/bp.png') }}" rel="icon">

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/bootstrap-icons.min.css" rel="stylesheet">
        <link href="{{ asset('adminpage/css/styles.css') }}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="layoutSidenav">

            <!-- SweetAlert -->
            @include('sweetalert::alert')

            <!-- ======= Header ======= -->
            @include('adminpage.header')

            <!-- ======= Sidebar ======= -->
            @include('adminpage.sidebar')
            
            <div id="layoutSidenav_content">
                <!-- ======= Content ======= -->
                @yield('content')

                <!-- ======= Footer ======= -->
                @include('adminpage.footer')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('adminpage/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('adminpage/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('adminpage/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('adminpage/js/datatables-simple-demo.js') }}"></script>
    </body>
</html>