@extends('layout')

@section('titles')
    Roles
@endsection

@section('title')
    Dashboard - @yield('titles') | Loisir et Compagnie
@endsection

@section('links')
    {{ $roles->links() }}
@endsection

@section('modal-title')
    Confirmation - Suppression
@endsection

@section('modal-body')
    Etes vous sur de bien vouloir supprimer
@endsection

@section('contents')

    {{-- Table dark --}}
    <div class="card">
        <h5 class="card-header">Liste Des Recents Role</h5>
        @if ($roles->isEmpty())
            <div class="container-fluid ">
                <div class="alert alert-warning" role="alert">Oups .... La liste des roles est vide — Reesayer !
                    {{-- <a href="">Ajouter un Role</a> --}}
                </div>
            </div>
        @else
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Role</th>
                            <th>Utilisteurs</th>
                            <th>created Date</th>
                            <th><span class="text-center">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($roles as $role)
                            <tr>
                                <td>
                                    <span @class([
                                        'badge me-1',
                                        $role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
                                    ])>
                                        {{ $role->name }}
                                    </span>
                                </td>
                                <td><a href="{{ route('roles.show', ['role' => $role->id]) }}">Voir les utilisateurs</a>
                                </td>
                                <td>
                                    {{ $role->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modalCenter">
                                            <i class="bx bx-edit-alt me-1"></i>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modalCenter">
                                                <i class="bx bx-trash me-1"></i>
                                    </div>
                                </td>
                                @section('modal-content')
                                    <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>

                                    </button>
                                @endsection
                            </tr>
                            @section('modal-content')
                                <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            @endsection
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('includes.paginate')
        @endif
    </div>
    {{-- @dd(session()) --}}
    
    <div class="row my-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    {{-- <h5>Creer un nouveaux Role</h5> --}}
                </div>
                <div class="card-body">
                    <form id="formAuthentication" class="mb-3" action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter your name" value="{{ old('name') }}" autofocus
                                required />
                            <div id="name" class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('includes.modal')

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
