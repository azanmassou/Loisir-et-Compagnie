@extends('layout')

@section('titles')
    Role Users
@endsection

@section('title')
    Dashboard - @yield('titles') | Loisir et Compagnie
@endsection

@section('links')
    {{ $users->links() }}
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
    {{-- <li>
        <button class="dropdown-item">
            <a href="{{ route('salles.create') }}">Ajouter</a>
        </button>
    </li> --}}
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
                <h5 class="card-header">Total Users <span @style('color:red')>{{ $role->user()->count() }}</span></h5>
            </div>
            <div class="col-lg-6">
               @component('components.dropdown')
                   
               @endcomponent
            </div>
        </div>


        @if ($users->isEmpty())
            <div class="container-fluid ">
                <div class="alert alert-warning" role="alert">Oups .... La liste est vide — Reesayer !
                </div>
            </div>
        @else
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Utilisateurs</th>
                            <th>Role</th>
                            {{-- <th>created Date</th> --}}
                            {{-- <th>Status</th> --}}
                            <th>created Date</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xs pull-up">
                                            <img src="{{ asset('admin/assets/img/avatars/5.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><a
                                                href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->username }}</a></strong>
                                    </div>
                                </td>
                                <td>
                                    <span @class([
                                    'badge me-1',
                                    // 'bg-label-success' => $user->email_verified_at != null,
                                    $user->role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
                                ])>
                                        {{ $user->role->name }}
                                    </span>
                                   
                                </td>
                                {{-- <td>
                                    {{ $user->created_at->diffForHumans() }}
                                </td> --}}

                                {{-- <td><span @class([
                                    'badge me-1',
                                    'bg-label-success' => $user->email_verified_at != null,
                                    'bg-label-danger' => ($user->email_verified_at = null),
                                    'bg-label-default' => ($user->email_verified_at = null),
                                ])>
                                        @if ($user->email_verified_at != null)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </span>
                                </td> --}}
                                {{-- @dd($user->role->name) --}}
                                <td>
                                    {{-- <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('users.edit', ['user' => $user->id]) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Edit</a>
                                            <a class="dropdown-item"
                                                href=""><i
                                                    class="bx bxl-500px mb-2"></i>
                                                Block</a>
                                            <a class="dropdown-item"
                                                href="{{ route('users.destroy', ['user' => $user->id]) }}"><i
                                                    class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div> --}}
                                    {{ $user->created_at->diffForHumans() }}
                                </td>
                                {{-- <td>

                                </td> --}}
                            </tr>
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
