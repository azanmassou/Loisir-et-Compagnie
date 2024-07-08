@extends('layout')

@section('titles')
    Utilisateurs
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
    <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete</button>
    </form>
@endsection

@section('user-id')
    {{ $user->id }}
@endsection

@section('user-username')
    {{ $user->username }}
@endsection

@section('user-email')
    {{ $user->email }}
@endsection

@section('user-role')
    <span @class([
        'badge me-1',
        $user->role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
    ])>
        {{ $user->role->name }}
    </span>
@endsection


@section('contents')
    @include('includes.profile')

    <div class="row my-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    {{-- <h5>Edit Role</h5> --}}
                </div>
                <div class="card-body">
                    <form id="formAuthentication" class="mb-3" action="{{ route('users.update', ['user' => $user->id]) }}"
                        method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="mb-3">
                            <label for="role_id" class="form-label">Change Role</label>
                            <select class="form-select @error('role_id') is-invalid @enderror" id="role_id"
                                name="role_id" required>
                                {{-- <option value="" selected disabled>-- Sélectionnez un rôle --</option> --}}
                                @foreach ($roles as $role)
                                    <option
                                        value="{{ $role->id }}" {{ $role->id == $user->role->id ? 'selected' : '' }}>
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
            </div>
        </div>
    </div>

    @include('includes/modal')
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
