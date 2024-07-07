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


@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{ asset('admin/assets/img/avatars/1.png') }}" alt="user-avatar" class="d-block rounded"
                            height="100" width="100" id="uploadedAvatar">
                        <div class="button-wrapper">

                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden=""
                                    accept="image/png, image/jpeg">
                            </label>
                            <button class="btn btn-outline-secondary account-image-reset mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>
                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="card-body">
                <div class="demo-inline-spacing text-end">
                    <div class="btn-group" id="dropdown-icon-demo">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{-- <i class="bx bx-menu"></i> --}}
                            <span>Menu</span>
                        </button>
                        <ul class="dropdown-menu" style="">
                           
                            <li>
                                <form action="{{ route('users.edit', ['user' => $user->id]) }}" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <button class="dropdown-item" type="submit"><i
                                            class="bx bx-edit-alt me-1"></i>Edit</button>
                                </form>
                            </li>
                            <li>
                                <hr class="dropdown-divider">

                            </li>
                            <li>

                                <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#modalCenter">
                                    <i class="bx bx-trash me-1"></i> Delete
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex mb-3 col-md-6">
                        <label for="firstName" class="form-label">Username</label>
                        <h6 class="ms-5">{{ $user->username }}</h6>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Role</label>
                        <h6 class="ms-5"> <span @class([
                            'badge me-1',
                            $user->role->name == 'admin' ? 'bg-label-success' : 'bg-label-warning',
                        ])>
                                {{ $user->role->name }}
                            </span></h6>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">E-mail</label>
                        <h6 class="ms-5">{{ $user->email }}</h6>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Created Date</label>
                        <h6 class="ms-5">{{ $user->created_at->diffForHumans() }}</h6>
                    </div>
                </div>
            </div>
            <!-- /Account -->
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    {{-- <h5>Edit Role</h5> --}}
                </div>
                <div class="card-body">
                    <form id="formAuthentication" class="mb-3" action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Change Role</label>
                            <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror">
                                {{-- <option value="" class="form-control @error('name') is-invalid @enderror">Choose your Role</option> --}}
                                @foreach ($roles as $role)
                                    <option autofocus required value="{{ $role->id}}" {{ $role->id == $user->role->id ? 'selected' : ''}} class="form-control @error('role_id') is-invalid @enderror">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <div id="role_id" class="invalid-feedback">
                                {{ $errors->first('role_id') }}
                            </div> 
                        </div>
                        <button class="btn btn-primary d-grid w-100">Submit</button>
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
