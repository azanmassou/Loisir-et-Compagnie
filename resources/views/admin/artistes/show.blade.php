@extends('layout')

@section('titles')
    Artistes
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
    <form action="{{ route('artistes.destroy', ['artiste' => $artiste->id]) }}" method="post">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
@endsection

@section('profile-name')
    {{ $artiste->NomArtiste }}
@endsection

@section('user-id')
    {{ $artiste->id }}
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
            <label>Id</label>
        </div>
        <div class="col-md-6">
            <p>{{ $artiste->id }}</p>
        </div>
    </div>

    @if ($artiste->spectacle)
        <div class="row">
            <div class="col-md-6">
                <label>Spectacle</label>
            </div>
            <div class="col-md-6">
                <p> <a
                        href="{{ route('spectacles.show', ['spectacle' => $artiste->spectacle->id]) }}">{{ $artiste->spectacle->NomSpectacle }}</a>
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
            <form action="{{ route('artistes.destroy', ['artiste' => $artiste->id]) }}" method="post">
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
                action="{{ route('artistes.update', ['artiste' => $artiste->id]) }}">
                @method('PATCH')
                @csrf
                <div class="mb-3">
                    <label for="NomArtiste" class="form-label">NomArtiste</label>
                    <input type="text" class="form-control @error('NomArtiste') is-invalid @enderror" id="NomArtiste"
                        name="NomArtiste" placeholder="Enter your NomArtiste"
                        value="{{ old('NomArtiste') ?? $artiste->NomArtiste }}" autofocus required />
                    <div id="NomArtiste" class="invalid-feedback">
                        {{ $errors->first('NomArtiste') }}
                    </div>
                </div>

               @if ($artiste->spectacle)
               <div class="mb-3">
                <label for="spectacle_id" class="form-label">Spectacle</label>
                <select id="spectacle_id" name="spectacle_id" class="form-select @error('spectacle_id') is-invalid @enderror">
                    @foreach ($spectacles as $spectacle)
                        <option value="{{ $spectacle->id }}" {{ $artiste->spectacle->id == $spectacle->id ? 'selected' : '' }}>
                            {{ $spectacle->NomSpectacle }}
                        </option>
                    @endforeach
                </select>
                <div id="spectacle_id" class="invalid-feedback">
                    {{ $errors->first('spectacle_id') }}
                </div>
            </div>
            <div id="spectacle_id" class="invalid-feedback">
                {{ $errors->first('spectacle_id') }}
            </div>
               @endif
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
