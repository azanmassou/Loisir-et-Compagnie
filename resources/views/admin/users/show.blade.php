@extends('layout')

@section('titles')
    Utilisateurs
@endsection

@section('title')
    Dashboard - @yield('titles') | Loisir et Compagnie
@endsection

@section('dropdown-li')
    <li>
        <form action="{{ route('users.edit', ['user' => $user->id]) }}" method="post">
            @method('PATCH')
            @csrf
            <button class="dropdown-item" type="submit"></i>Edit</button>
        </form>
    </li>
    <li>
        <hr class="dropdown-divider">
    </li>
    <li>
        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal2">
            {{ $user->isBlocked == false ? 'Block' : 'Unblock' }}
        </button>
    </li>
    <li>
        <!-- Button triggers for the first modal -->
        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            Delete
        </button>
    </li>
@endsection

@section('profile-name')
    {{ $user->username }}
@endsection

@section('user-id')
    {{ $user->id }}
@endsection

@section('user-name')
    {{ $user->username }}
@endsection

@section('user-email')
    {{ $user->email }}
@endsection

@section('user-username')
    {{ $user->username }}
@endsection

@section('profile-detail')
    <a href="{{ route('roles.show', ['role' => $user->role->id]) }}"><span @class([
        'badge me-1',
        $user->role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
    ])>
            {{ $user->role->name }}
        </span></a>
@endsection

@section('profile-line')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="false">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                aria-selected="true">Timeline</a>
        </li>
    </ul>
@endsection

@section('profile-left')
    <div class="profile-work">
        {{-- <p>WORK LINK</p>
        <a href="">Website Link</a><br />
        <a href="">Bootsnipp Profile</a><br />
        <a href="">Bootply Profile</a>
        <p>SKILLS</p>
        <a href="">Web Designer</a><br />
        <a href="">Web Developer</a><br />
        <a href="">WordPress</a><br />
        <a href="">WooCommerce</a><br />
        <a href="">PHP, .Net</a><br /> --}}
        <form id="formAuthentication" class="mb-3" action="{{ route('users.update', ['user' => $user->id]) }}"
            method="POST">
            @method('PATCH')
            @csrf
            <div class="mb-3">
                {{-- <label for="role_id" class="form-label">Change Role</label> --}}
                <select class="form-select @error('role_id') is-invalid @enderror" id="role_id" name="role_id" required>
                    {{-- <option value="" selected disabled>-- Sélectionnez un rôle --</option> --}}
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $role->id == $user->role->id ? 'selected' : '' }}>
                            {{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary d-grid w-100">Change Role</button>
        </form>
    </div>
@endsection

@section('profile-data')
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row">
            <div class="col-md-6">
                <label>User Id</label>
            </div>
            <div class="col-md-6">
                <p>@yield('user-id')</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Username</label>
            </div>
            <div class="col-md-6">
                <p>@yield('user-username')</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Email</label>
            </div>
            <div class="col-md-6">
                <p>@yield('user-email')</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Phone</label>
            </div>
            <div class="col-md-6">
                <p>123 456 7890</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Status</label>
            </div>
            <div class="col-md-6">
                <p>{{ $user->isBlocked == 0 ? 'Actif' : 'Inactif' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Profession</label>
            </div>
            <div class="col-md-6">
                <p>Web Developer and Designer</p>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row">
            <div class="col-md-6">
                <label>Experience</label>
            </div>
            <div class="col-md-6">
                <p>Expert</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Hourly Rate</label>
            </div>
            <div class="col-md-6">
                <p>10$/hr</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Total Projects</label>
            </div>
            <div class="col-md-6">
                <p>230</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>English Level</label>
            </div>
            <div class="col-md-6">
                <p>Expert</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Availability</label>
            </div>
            <div class="col-md-6">
                <p>6 months</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Your Bio</label><br />
                <p>Your detail description</p>
            </div>
        </div>
    </div>
@endsection

@section('contents')
    @include('includes.profile')

    <!-- Utiliser le composant modal -->
    @component('components.modal', [
        'id' => 'exampleModal1',
        'title' => 'Confirmation Operation',
    ])
        <p>Etes vous sur de bien vouloir continuer</p>
        @slot('footer')
            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endslot
    @endcomponent

    <!-- Utiliser le composant modal -->
    @component('components.modal', [
        'id' => 'exampleModal2',
        'title' => 'Confirmation Operation',
    ])
        <p>Etes vous sur de bien vouloir continuer</p>
        @slot('footer')
            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
                <input type="hidden" name="isBlocked" value="{{ $user->isBlocked }}">
                @method('PATCH')
                @csrf
                <button class="btn btn-warning" type="submit">{{ $user->isBlocked == false ? 'Block' : 'Unblock' }}</button>
            </form>
        @endslot
    @endcomponent

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
