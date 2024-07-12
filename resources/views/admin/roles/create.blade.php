@extends('layout')

@section('titles')
    Create Role
@endsection

@section('title')
    Dashboard - @yield('titles') | Loisir et Compagnie
@endsection

@section('contents')
    {{-- <div class="col-lg-6">
        <div class="card">
            <div id="responseMessage" class="mt-3"></div>
            <div class="card-body">
                <form id="AddRoleForm" class="mb-3" method="POST" action="{{ route('salles.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="TypeSalle" class="form-label">TypeSalle</label>
                        <input type="text" class="form-control @error('TypeSalle') is-invalid @enderror" id="TypeSalle"
                            name="TypeSalle" placeholder="Enter your TypeSalle" value="{{ old('TypeSalle') }}" autofocus
                            required />
                        <div id="TypeSalle" class="invalid-feedback">
                            {{ $errors->first('TypeSalle') }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Capacite" class="col-md-2 col-form-label">Cap</label>
                        <div class="col-md-10">
                            <input class="form-control @error('Capacite') is-invalid @enderror" name="Capacite"
                                type="number" value="{{ old('Capacite') }}" id="Capacite"
                                placeholder="Enter capacity of salle">
                            <div id="Capacite" class="invalid-feedback">
                                {{ $errors->first('Capacite') }}
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary d-grid w-100">Add</button>
                </form>
            </div>
        </div>
    </div> --}}

    <div class="card">
        <div id="responseMessage" class="mt-3"></div>
        <div class="card-body">
            <form id="AddRoleForm" class="mb-3" method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="col-md-2 col-form-label">Role name</label>
                    <input type="text" class="col-lg-8 form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Enter your role name" value="{{ old('name') }}" autofocus required />
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
