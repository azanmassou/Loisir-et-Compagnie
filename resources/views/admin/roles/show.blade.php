@extends('layout')

@section('titles')
    Roles
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
    <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="post">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
@endsection

{{-- @section('profile-name')
    <span @class([
        'badge me-1',
        $role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
    ])>
        {{ $role->name }}
    </span>
@endsection

@section('user-id')
    {{ $role->id }}
@endsection

@section('user-name')
    {{ $role->id }}
@endsection

@section('user-email')
    {{ $role->id }}
@endsection

@section('profile-detail')
    <span @class([
        'badge me-1',
        $user->role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
    ])>
        {{ $user->role->name }}
    </span>
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
@endsection --}}

@section('dropdown-li')
    <li>
        {{-- <form action="{{ route('users.edit', ['user' => $user->id]) }}" method="post">
            @method('PATCH')
            @csrf
            <button class="dropdown-item" type="submit"><i
                    class="bx bx-edit-alt me-1"></i>Edit</button>
        </form> --}}
    </li>
    {{-- <li>
        <hr class="dropdown-divider">
    </li> --}}
    <li>
        {{-- <a class="dropdown-item" href="{{ route('roles.edit', ['role' => $role->id]) }}">Edit</a> --}}
    </li>
    <li>
    <li>
        <!-- Button triggers for the first modal -->
        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal1">
            Delete
        </button>
    </li>
    </li>
@endsection


@section('contents')
    <div class="container">
        <div class="card p-4">

            <div class="text-end">
                @component('components.dropdown')
                    @slot('slot')
                        @yield('dropdown-li')
                    @endslot
                @endcomponent
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <h4><span @class([
                        'badge me-1',
                        $role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
                    ])>
                            {{ $role->name }}
                        </span>
                    </h4>

                    <form id="AddRoleForm" class="mb-3" method="POST"
                        action="{{ route('roles.update', ['role' => $role->id]) }}">
                        @method('PATCH')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="col-md-2 col-form-label">Role name</label>
                            <input type="text" class="col-lg-8 form-control @error('name') is-invalid @enderror"
                                id="name" name="name" placeholder="Enter your role name"
                                value="{{ old('name') ?? $role->name }}" autofocus required />
                            <div id="name" class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary d-grid w-100">Edit</button>
                    </form>
                </div>
                <div class="col-lg-6 text-center">
                    <h4> <span @style('color:red')>{{ $role->user()->count() }}</span>
                        <a href="{{ route('roles.users', ['role' => $role->id]) }}">Liste (s)</a>
                    </h4>
                    <h4><span @class([
                        'badge me-1',
                        $role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
                    ])>
                            {{ $role->name == 'admin' ? 'success' : 'warning' }}
                        </span>
                    </h4>
                    <h4> <span @class([
                        'badge me-1',
                        $role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
                    ])>
                            {{ $role->created_at->diffForHumans() }}
                        </span>



                        {{-- {{ $role->created_at->diffForHumans() }}</h4> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Composant Dropdown --}}

    @component('components.modal', [
        'id' => 'exampleModal1',
        'title' => 'Confirmation Operation',
    ])
        <p>Etes vous sur de bien vouloir continuer</p>
        @slot('footer')
            <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
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
