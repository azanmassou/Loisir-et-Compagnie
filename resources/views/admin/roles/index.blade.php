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



@section('contents')

    <div class="row">
        <div class="col-md-6 col-lg-12 order-2 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Roles <span @style('color:red')>{{ $countRoles }}</span><a class="mx-4"
                            href="{{ route('roles.create') }}">Ajouter</a></h5>
                    <!-- Button triggers for the first modal -->
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">

                        @if ($roles->isEmpty())
                            <div class="container-fluid ">
                                <div class="alert alert-warning" role="alert">Oups .... La liste des roles est vide —
                                    Reesayer !
                                </div>
                            </div>
                        @else
                            {{-- @foreach ($roles as $role)
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <a href=""><img
                                                src="http://127.0.0.1:8000/admin/assets/img/icons/unicons/wallet.png"
                                                alt="User" class="rounded"></a>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <a href="{{ route('roles.show', ['role' => $role->id]) }}">
                                                <small class="text-muted d-block mb-1"> <span @class([
                                                    'badge me-1',
                                                    $role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
                                                ])>
                                                        {{ $role->name }}
                                                    </span>Details
                                                </small>
                                            </a>
                                            <h6 class="mb-0 my-3">{{ $role->created_at->diffForHumans() }}</h6>
                                        </div>
                                        <div class="user-progress d-flex align-items-center gap-1">
                                            <h6 class="mb-0"><span
                                                    @style('color:red')>{{ $role->user()->count() }}</span></a></h6>
                                            <span class="text-muted"><a
                                                    href="{{ route('roles.users', ['role' => $role->id]) }}">User(s)</a></span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach --}}
                            <div class="row">
                                @foreach ($roles as $role)
                                    @section('dropdown-li')
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <form action="{{ route('roles.edit', ['role' => $role->id]) }}" method="post">
                                                @method('PATCH')
                                                @csrf
                                                <button class="dropdown-item" type="submit"></i>Edit</button>
                                            </form>
                                        </li>
                                        <li>
                                            <!-- Button triggers for the first modal -->
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal1">
                                                Delete
                                            </button>
                                        </li>
                                    @endsection

                                    <!-- Utiliser le composant modal -->
                                    @component('components.modal', [
                                        'id' => 'exampleModal1',
                                        'title' => 'Confirmation Operation',
                                    ])
                                        <p>Etes vous sur de bien vouloir continuer</p>
                                        @slot('footer')
                                            <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        @endslot
                                    @endcomponent

                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100 text-center">
                                            <div class="card-body">

                                                <div class="text-end">
                                                    @component('components.dropdown')
                                                        @slot('slot')
                                                            @yield('dropdown-li')
                                                        @endslot
                                                    @endcomponent
                                                </div>
                                                <div class="card-icon mb-3">
                                                    <i class="bi bi-person"></i> <!-- Example icon -->
                                                </div>
                                                <div class="my-2">
                                                    <img src="http://127.0.0.1:8000/admin/assets/img/icons/unicons/wallet.png"
                                                        alt="User" class="rounded">
                                                </div>
                                                <h5 class="card-title">

                                                    <small class="text-muted d-block mb-1"> <span
                                                            @class([
                                                                'badge me-1',
                                                                $role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
                                                            ])>
                                                            {{ $role->name }}
                                                        </span>Details
                                                    </small>
                                                </h5>
                                                <a href="{{ route('roles.users', ['role' => $role->id]) }}">
                                                    <p class="card-text text-muted"><span
                                                            @style('color:red')>{{ $role->user()->count() }}</span>
                                                        Utilisateur(s)</p>
                                                </a>
                                                <p class="card-text text-muted">{{ $role->created_at->format('d/m/Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            @include('includes.paginate')
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-12 mb-4 order-0">
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
        </div> --}}
    </div>

    {{-- <div class="row">
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
    </div> --}}
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
