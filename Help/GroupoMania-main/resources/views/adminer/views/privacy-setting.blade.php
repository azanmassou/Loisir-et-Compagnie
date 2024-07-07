@extends('adminer.dashboard.layouts')

@section('title')
    Privacy Setting
@endsection
{{-- @section('alerte')
   L'operation s'est bien deroule .... 
@endsection --}}

{{-- @section('profile-post')
    @include('adminer.dashboard.profile-post')
@endsection --}}

@section('bank')
@include('adminer.app.privacy-setting')
@endsection

@section('content')
    @include('adminer.dashboard.dashboard')
@endsection

