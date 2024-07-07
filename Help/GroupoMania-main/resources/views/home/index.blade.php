@section('card-title')
    <form action="" method="get">
        {{-- @csrf --}}
        <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="title" class="form-control float-left @error('title') is-invalid @enderror"
                placeholder="Search" value="{{ $requestSearch ?? '' }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                </button>
                <div id="title" class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
            </div>
            {{-- <a href="@yield('route')" class="btn btn-primary">Ajouter un @yield('btn-title')</a> --}}
        </div>

    </form>
@endsection

@section('btn-title')
    Post
@endsection

@section('route')
    {{ route('posts.create') }}
@endsection

{{-- @section('foreach')
    @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td><a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title }}</a></td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->user->name }}</td>
            <td class="text-end">
                <form action="{{route('posts.destroy',['post' => $post->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="badge bg-danger p-2">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
@endsection --}}


@section('first-title')
    Post
@endsection
@section('second-title')
    Utilisateur
@endsection
@section('third-title')
    Date de Creation
@endsection

@section('empty')
    Aucun post dans la base de donne
@endsection

@section('contents')
    @include('inc.templates.liste')
    @include('post')

@section('links')
    @if ($isValidSearch)
    @else
        {{ $posts->links() }}
    @endif
@endsection

@include('components.paginate')
@endsection


@section('contents-title')
<h2>Liste de tout les Posts</h2>
@endsection

@extends('layout')

@section('content')

@section('dataEmpty')
    @if ($posts->isEmpty())
        @include('components.empty')
    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    @yield('contents')

                </div>

            </div>

        </div>
    @endif
@endsection

@include('dashbord')



@endsection
