@section('links')
    {{-- @if ($isValidSearch)
    @else --}}
        {{-- {{ $users->links() }} --}}
    {{-- @endif
@endsection --}}

@section('title')
    Dashbord
@endsection

@section('pageTitle')
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-table-large menu-icon"></i>
        </span> Details sur L'utilisateur
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
@endsection

@section('pageContent')
    @include('partials.table.user')
@endsection



@extends('layouts')

@section('content')
    @include('dashboard')
@endsection
