@extends('layout')

@section('title')
    Dashboard - @yield('titles') | Loisir et Compagnie
@endsection

@section('content')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @include('includes/sidebar')

            <!-- Layout container -->
            <div class="layout-page">

                @include('includes/navbar')

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                       

                        @yield('contents')

                    </div>
                    <!-- / Content -->

                    @include('includes/footer')

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
@endsection
