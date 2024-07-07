@extends('adminer.dashboard.layouts')

@section('title')
    Mes Posts
@endsection

@section('alerte')
   L'operation s'est bien deroule .... 
@endsection

@section('links')
    {{ $posts->links()}}
@endsection

{{-- @section('profile-post')
    @include('adminer.dashboard.profile-post')
@endsection --}}

@section('contents')
{{-- @include('adminer.app.profile') --}}
@include('adminer.dashboard.profile-post')
@include('components.paginate')
@endsection

@section('content')
    @include('adminer.dashboard.dashboard')
    
@endsection

