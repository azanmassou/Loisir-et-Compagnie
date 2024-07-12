@extends('layout')

@section('titles')
    Edit Role
@endsection

@section('title')
    Dashboard - @yield('titles') | Loisir et Compagnie
@endsection

@section('contents')
    <div class="card">
        <div class="card-body">
            <form id="AddRoleForm" class="mb-3" method="POST" action="{{ route('roles.update',['role' => $role->id]) }}">
                @method("PATCH")
                @csrf
                <div class="mb-3">
                    <label for="name" class="col-md-2 col-form-label">Role name</label>
                    <input type="text" class="col-lg-8 form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Enter your role name" value="{{ old('name') ?? $role->name }}"  autofocus required />
                    <div id="name" class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Add</button>
            </form>
        </div>
    </div>
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
