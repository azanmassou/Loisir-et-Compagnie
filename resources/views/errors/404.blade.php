@extends('layout')

@section('title')
    Page Not Found - 404 | Loisir et Compagnie
@endsection

@section('content')
    <center>
        <!-- Layout wrapper -->
        <div class="container-xxl container-p-y mx-auto justify-content-center">
            <div class="misc-wrapper">
                <h2 class="mb-2 mx-2">Page Not Found :(</h2>
                <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>
                {{-- <a href="" on class="btn btn-primary">Go Back</a> --}}
                <button class="btn btn-primary" onclick="goBack()"> Go Back</button>
                <div class="mt-3">
                    <img src="{{ asset('admin/assets/img/illustrations/page-misc-error-light.png') }}"
                        alt="page-misc-error-light" width="500" class="img-fluid"
                        data-app-dark-img="illustrations/page-misc-error-dark.png"
                        data-app-light-img="illustrations/page-misc-error-light.png">
                </div>
            </div>
        </div>
        <!-- / Layout wrapper -->
    </center>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
