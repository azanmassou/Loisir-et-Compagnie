@section('links')
    
        {{ $posts->links() }}
  
@endsection

@section('title')
    Dashbord 
@endsection

@section('pageTitle')
<h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
        {{-- <i class="mdi mdi-home"></i> --}}
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
    </span> Postes
</h3>
<nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i
                    class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
@endsection

@section('pageContent')
    @include('partials.table.posts')
@endsection



@extends('layouts')

@section('content')

    @include('dashboard')

@endsection