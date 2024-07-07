{{-- @section('card-title')
    <form action="" method="get">
        @csrf
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
           
        </div>

    </form>
@endsection

@section('btn-title')
    Post
@endsection

@section('route')
    {{ route('posts.create') }}
@endsection

@section('links')
    @if ($isValidSearch)
    @else
        {{ $posts->links() }}
    @endif
@endsection

@section('foreach')
    @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td><a href="{{route('posts.show', ['post' => $post->id])}}">{{ $post->title }}</a></td>
            <td>{{ $post->user->name }}</td>
            <td class=""><a class="badge bg-warning p-2"
                    href=" {{ route('posts.update', ['post' => $post->id]) }}">Modifier</a></td>
            <td class=""><a class="badge bg-danger p-2"
                    href=" {{ route('posts.destroy', ['post' => $post->id]) }}">Supprimer</a></td>
        </tr>
    @endforeach
@endsection


@section('first-title')
    Post
@endsection
@section('second-title')
    Utilisateur
@endsection --}}


{{-- @section('contents')
    @include('inc.templates.liste')
@endsection --}}

@section('contents-title')
    <h2>Creer un post</h2>
@endsection

@extends('layout')

@section('content')

@section('dataEmpty')
<div class="container">
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        {{-- @include('includes.forms.salle_ins') --}}
        @csrf
        <div class="form-group">
            <label for="title">Titre du Post</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                name="title" value="{{ old('title')}}" placeholder="Eg : Le titre de mon Post">
            <div id="title" class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
        </div>
        <div class="form-group">
            <label for="content">Contenu de votre Post</label>
            <textarea cols="15" rows="5" class="form-control @error('content') is-invalid @enderror" id="content"
                name="content" value="{{ old('content')}}" placeholder="Veillez insere le contenu de votre post"></textarea>
                {{-- <textarea name="content" id="content" ></textarea> --}}
            <div id="content" class="invalid-feedback">
                {{ $errors->first('content') }}
            </div>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Choisir une image</label>
            <input class="form-control" type="file" id="formFile" name="image">
            <div id="image" class="invalid-feedback">
                {{ $errors->first('image') }}
            </div>
          </div>
    
        <button type="submit" class="btn btn-primary">Ajouter un Post</button>
    </form>
</div>
@endsection

    @include('dashbord')
@endsection
