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
        <button class="dropdown-item">
            <a href="{{ route('roles.create') }}">Ajouter</a>
        </button>
    </li>
    {{-- <li>
        <button type="button" class="dropdown-item" data-bs-toggle="modal"
            data-bs-target="#modalCenter">
            <i class="bx bx-trash me-1"></i> Delete
        </button>
    </li> --}}
@endsection

@section('contents')

    {{-- Table dark --}}
    <div class="card">
        <div class="row">
            <div class="col-lg-6">
                <h5 class="card-header">Total Roles <span @style('color:red')>{{ $countRoles }}</span><a class="mx-4"
                        href="{{ route('roles.create') }}">Ajouter</a></h5>
            </div>
            <div class="col-lg-6">
                @include('includes.dropdown')
            </div>
        </div>
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
                            <th>#</th>
                            <th>Role</th>
                            <th>Color</th>
                            {{-- <th>Utilisteurs</th> --}}
                            <th>created Date</th>
                            {{-- <th><span>Actions</span></th> --}}
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($roles as $role)
                            <tr>
                                <td>
                                    {{ $role->id }}
                                </td>
                                <td>
                                    <a href="{{ route('roles.show', ['role' => $role->id]) }}">
                                        {{ $role->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('roles.show', ['role' => $role->id]) }}">
                                        <span @class([
                                            'badge me-1',
                                            $role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
                                        ])>
                                            {{ $role->name == 'admin' ? 'success' : 'warning' }}
                                        </span>
                                    </a>
                                </td>
                                {{-- <td>
                                    <span  @style('color:red')>{{$role->user()->count()}}</span>
                                    <a href="{{ route('roles.users', ['role' => $role->id]) }}">Liste (s)</a>
                                </td> --}}
                                <td>
                                    {{ $role->created_at->diffForHumans() }}
                                </td>
                                {{-- <td>
                                    <div class="d-flex">
                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modalCenter">
                                            <i class="bx bx-edit-alt me-1"></i>
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#modalCenter">
                                                <i class="bx bx-trash me-1"></i>
                                    </div>
                                </td> --}}
                                {{-- @section('modal-content')
                                    <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                @endsection --}}
                            </tr>
                            {{-- @section('modal-content')
                                <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            @endsection --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('includes.paginate')
        @endif
    </div>

    <div class="row my-4">
        <div class="col-lg-6 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Congratulations John! 🎉</h5>
                            <p class="mb-4">
                                You have done <span class="fw-bold">72%</span> more sales today. Check
                                your new badge in
                                your profile.
                            </p>

                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View
                                Badges</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="http://127.0.0.1:8000/admin/assets/img/illustrations/man-with-laptop-light.png"
                                height="140" alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Congratulations John! 🎉</h5>
                            <p class="mb-4">
                                You have done <span class="fw-bold">72%</span> more sales today. Check
                                your new badge in
                                your profile.
                            </p>

                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View
                                Badges</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="http://127.0.0.1:8000/admin/assets/img/illustrations/man-with-laptop-light.png"
                                height="140" alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
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
