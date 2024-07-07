@extends('adminer.dashboard.layouts')

@section('title')
    Dashboard
@endsection

{{-- @section('links')
    {{ $posts->links()}}
@endsection --}}

@section('contents')

    @include('adminer.dashboard.post')
    {{-- @include('components.paginate') --}}

@endsection

@section('content')
    @include('adminer.dashboard.dashboard')
@endsection