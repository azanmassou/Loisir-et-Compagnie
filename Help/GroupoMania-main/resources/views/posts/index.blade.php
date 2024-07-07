@extends('layout')

@section('title')
    La liste des Posts
@endsection

@section('content')

    @extends('inc/templates/liste')

@section('card-title')

<div class="input-group input-group-sm" style="width: 150px;">
    <input type="text" name="table_search" class="form-control float-left"
            placeholder="Search">
        <div class="input-group-append">
            <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
            </button>
        </div>
    {{-- <a href="@yield('route')" class="btn btn-primary">Ajouter un @yield('btn-title')</a> --}}
</div>
@endsection

@section('btn-title')
    Post
@endsection

@section('route')
    {{ route('posts.create') }}
@endsection

@section('links')
    {{ $posts->links() }}
@endsection

@section('foreach')
    @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td class="text-end"><a class="badge bg-warning p-2"
                    href=" {{ route('posts.show', ['post' => $post->id]) }}">Details</a></td>
        </tr>
    @endforeach
@endsection

@endsection
