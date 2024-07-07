@extends('layout')

{{-- @extends('includes.Templates.navbar') --}}

@section('title')
    Creer un Postes
@endsection

@section('content')
    <div class="container my-4">
        <h3>Creer un Post</h3>
        {{-- <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div> --}}
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
