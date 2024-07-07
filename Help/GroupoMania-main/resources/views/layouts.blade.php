<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GroupoMania @yield('title')</title>
    <!-- plugins:css -->
    {{-- <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css"> --}}
    <link href="{{ asset('masterDashboard/assets/vendors/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">


    {{-- <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css"> --}}
    <link href="{{ asset('masterDashboard/assets/vendors/css/vendor.bundle.base.css') }}" rel="stylesheet">


    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    {{-- <link rel="stylesheet" href="assets/css/style.css"> --}}
    <link href="{{ asset('masterDashboard/assets/css/style.css') }}" rel="stylesheet">
    <!-- End layout styles -->
    {{-- <link rel="shortcut icon" href="assets/images/favicon.ico" /> --}}
    {{-- <link rel="shortcut icon" href="{{ asset('masterDashboard/assets/images/favicon.ico') }}" /> --}}

    <link rel="shortcut icon" href="{{ asset('Logos/icon-left-font-monochrome-white.png') }}" />
    
    {{-- Importation Css JS Vite --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>

<body>
   @yield('content')

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('masterDashboard/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    {{-- <script src="assets/vendors/js/vendor.bundle.base.js"></script> --}}
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('masterDashboard/assets/vendors/chart.js/Chart.min.js') }}"></script>
    {{-- <script src="assets/vendors/chart.js/Chart.min.js"></script> --}}

    <script src="{{ asset('masterDashboard/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    {{-- <script src="assets/js/jquery.cookie.js" type="text/javascript"></script> --}}
    <!-- End plugin js for this page -->
    <!-- inject:js -->

    <script src="{{ asset('masterDashboard/assets/js/off-canvas.js') }}"></script>
    {{-- <script src="assets/js/off-canvas.js"></script> --}}

    <script src="{{ asset('masterDashboard/assets/js/hoverable-collapse.js') }}"></script>
    {{-- <script src="assets/js/hoverable-collapse.js"></script> --}}

    <script src="{{ asset('masterDashboard/assets/js/misc.js') }}"></script>
    {{-- <script src="assets/js/misc.js"></script> --}}
    <!-- endinject -->
    <!-- Custom js for this page -->
    {{-- <script src="assets/js/dashboard.js"></script> --}}
    <script src="{{ asset('masterDashboard/assets/js/dashboard.js') }}"></script>
    
    {{-- <script src="assets/js/todolist.js"></script> --}}
    <script src="{{ asset('masterDashboard/assets/js/todolist.js') }}"></script>
    <!-- End custom js for this page -->
</body>

</html>
