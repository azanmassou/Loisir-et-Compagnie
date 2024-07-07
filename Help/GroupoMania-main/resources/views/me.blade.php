@extends('layout')

@section('content')

    @include('navbar')

    <div class="container">

        <div class="row">
            <div class="d-flex flex-row align-items-center justify-content-between align-self-center">
                <div class="d-inline p-2  text-dark">Mes recent Post</div>
                {{-- <div class="d-inline p-2 "><a href="{{ route('posts.create') }}" class="btn btn-primary">Creer un post</a> --}}
                </div>
            </div>
        </div>

        @include('post')

    @section('links')
        {{ $posts->links() }}
    @endsection

    @include('paginate')
</div>


@endsection
