@extends('layout')

@section('titles')
    Utilisateurs
@endsection

@section('title')
    Dashboard - @yield('titles') | Loisir et Compagnie
@endsection

@section('links')
    {{$users->links()}}
@endsection

@section('contents')
    {{-- Table dark --}}
    <div class="card">
        <h5 class="card-header">Liste des utilisateurs</h5>

        @if ($users->isEmpty())
            <div class="container-fluid ">
                <div class="alert alert-warning" role="alert">Oups .... La liste des utilisateurs est vide — Reesayer !
                </div>
            </div>
        @else
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Username</th>
                            <th>E-mail</th>
                            {{-- <th>created Date</th> --}}
                            {{-- <th>Status</th> --}}
                            <th>created Date</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xs pull-up">
                                            <img src="{{ asset('admin/assets/img/avatars/5.png') }}" alt="Avatar"
                                                class="rounded-circle">
                                        </div>
                                        <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><a
                                                href="{{route('users.show', ['user' => $user->id])}}">{{ $user->username }}</a></strong>
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
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
                                <td><span @class([
                                    'badge me-1',
                                    $user->role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
                                    // 'bg-label-default' => $user->role->name,
                                ])>
                                         {{ $user->role->name == 'admin' ? 'admin' : 'user' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            @include('includes.paginate')
        @endif
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
