@extends('adminer.dashboard.layouts')

@section('title')
    Profile
@endsection
@section('alerte')
   L'operation s'est bien deroule .... 
@endsection

@section('profile-post')
    @include('adminer.dashboard.profile-post')
@endsection

@section('contents')
@include('adminer.app.profile')
@endsection

@section('content')
    @include('adminer.dashboard.blank')
@endsection

