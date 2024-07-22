@extends('layout')

@section('titles')
    Salles
@endsection

@section('title')
    Dashboard - @yield('titles') | Loisir et Compagnie
@endsection

@section('modal-title')
    Confirmation - Suppression
@endsection

@section('modal-body')
    Etes vous sur de bien vouloir supprimer
@endsection

@section('modal-content')
    <form action="{{ route('salles.destroy', ['salle' => $salle->id]) }}" method="post">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
@endsection

@section('profile-name')
    {{ $salle->TypeSalle }}
@endsection

@section('user-id')
    {{ $salle->id }}
@endsection

{{-- @section('user-name')
    {{ $salle->username }}
@endsection --}}

{{-- @section('user-email')
    {{ $user->email }}
@endsection --}}

@section('profile-detail')
    {{-- <span @class([
        'badge me-1',
        $user->role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
    ])>
        {{ $user->role->name }}
    </span> --}}
@endsection

@section('profile-line')
@endsection

@section('profile-left')
    {{-- <div class="profile-work">
        <p>WORK LINK</p>
        <a href="">Website Link</a><br />
        <a href="">Bootsnipp Profile</a><br />
        <a href="">Bootply Profile</a>
        <p>SKILLS</p>
        <a href="">Web Designer</a><br />
        <a href="">Web Developer</a><br />
        <a href="">WordPress</a><br />
        <a href="">WooCommerce</a><br />
        <a href="">PHP, .Net</a><br />
    </div> --}}
@endsection

@section('profile-data')
    <div class="row">
        <div class="col-md-6">
            <label>Capacite</label>
        </div>
        <div class="col-md-6">
            <p>{{ $salle->Capacite }}</p>
        </div>
    </div>

    @if ($salle->representation)
        <div class="row">
            <div class="col-md-6">
                <label>Representation</label>
            </div>
            <div class="col-md-6">
                <p> <a
                        href="{{ route('representations.show', ['representation' => $salle->representation->id]) }}">{{ $salle->representation->NomRepresentation }}</a>
                </p>
            </div>
        </div>
    @endif
@endsection

@section('dropdown-li')
    {{-- <li>
        <hr class="dropdown-divider">
    </li> --}}
    <li>
        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            Delete
        </button>
    </li>
@endsection


@section('contents')
    @include('includes.profile')

    @component('components.modal', [
        'id' => 'exampleModal1',
        'title' => 'Confirmation Operation',
    ])
        <p>Etes vous sur de bien vouloir continuer</p>
        @slot('footer')
            <form action="{{ route('salles.destroy', ['salle' => $salle->id]) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endslot
    @endcomponent

    <div class="card">
        <div id="responseMessage" class="mt-3"></div>
        <div class="card-body">
            <form id="AddRoleForm" class="mb-3" method="POST"
                action="{{ route('salles.update', ['salle' => $salle->id]) }}">
                @method('PATCH')
                @csrf
                <div class="mb-3">
                    <label for="TypeSalle" class="form-label">TypeSalle</label>
                    <input type="text" class="form-control @error('TypeSalle') is-invalid @enderror" id="TypeSalle"
                        name="TypeSalle" placeholder="Enter your TypeSalle"
                        value="{{ old('TypeSalle') ?? $salle->TypeSalle }}" autofocus required />
                    <div id="TypeSalle" class="invalid-feedback">
                        {{ $errors->first('TypeSalle') }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="Capacite" class="col-md-2 col-form-label">Cap</label>
                    <div class="col-md-10">
                        <input class="form-control @error('Capacite') is-invalid @enderror" name="Capacite" type="number"
                            value="{{ old('Capacite') ?? $salle->Capacite }}" id="Capacite"
                            placeholder="Enter capacity of salle">
                        <div id="Capacite" class="invalid-feedback">
                            {{ $errors->first('Capacite') }}
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Edit</button>
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
