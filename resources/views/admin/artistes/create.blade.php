@extends('layout')

@section('titles')
    Create Artiste
@endsection

@section('title')
    Dashboard - @yield('titles') | Loisir et Compagnie
@endsection

@section('contents')
    
<div class="col-lg-12">
    <div class="card">
        <div id="responseMessage" class="mt-3"></div>
        <div class="card-body">
            <form id="AddRoleForm" class="mb-3" method="POST"
                action="{{ route('artistes.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="NomArtiste" class="form-label">NomArtiste</label>
                    <input type="text" class="form-control @error('NomArtiste') is-invalid @enderror" id="NomArtiste"
                        name="NomArtiste" placeholder="Enter your NomArtiste"
                        value="{{ old('NomArtiste')}}" autofocus required />
                    <div id="NomArtiste" class="invalid-feedback">
                        {{ $errors->first('NomArtiste') }}
                    </div>
                </div>

                {{-- <div class="mb-3">
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
                </div> --}}
                <button type="submit" class="btn btn-primary d-grid w-100">Create</button>
            </form>
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
