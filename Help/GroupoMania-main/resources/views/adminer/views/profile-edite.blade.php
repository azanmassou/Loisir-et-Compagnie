@extends('adminer.dashboard.layouts')

@section('title')
    Profile - Edite
@endsection
{{-- @section('alerte')
   L'operation s'est bien deroule .... 
@endsection --}}

{{-- @section('profile-post')
    @include('adminer.dashboard.profile-post')
@endsection --}}

@section('bank')
@include('adminer.app.profile-edit')
@endsection

@section('content')
    @include('adminer.dashboard.dashboard')
@endsection

