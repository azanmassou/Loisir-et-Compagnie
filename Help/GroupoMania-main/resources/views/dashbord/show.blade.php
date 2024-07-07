@section('contents-title')
    <h2>Details sur l'Utilisateur</h2>
@endsection

@extends('layout')

@section('content')

@section('dataEmpty')
    <div class="container">
        <!-- Header du Post -->

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="url_de_votre_avatar.jpg" alt="Avatar" class="rounded-circle me-3" style="width: 40px;">
                    <div class="d-block mt-2">
                        <h5 class="mb-0">{{ $post->user->name }}</h5>
                        <small class="text-muted text-end mx-3">{{ $post->created_at }}</small>
                    </div>
                </div>
            </div>

            <!-- Image du Post -->

            {{-- @dd(asset('storage/post' . $post->image)) --}}
            <img src="{{ asset('storage/post/' . $post->image) }}" class="card-img-top p-4" alt="Image du Post">

            <!-- Contenu du Post -->
            <div class="card-body">
                <!-- Titre du Post -->
                <h5 class="card-title">{{ $post->title }}</h5>

                <!-- Texte du Post -->
                <p class="card-text">{{ $post->content }}</p>

                <!-- Boutons de Like, Commenter, Partager -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <!-- Bouton Like -->
                    @if (!$user->role->name === 'admin')
                    <form action="{{ route('posts.like', $post->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary"><i class="fas fa-thumbs-up"></i>
                            Like ({{ $post->likes }})</button>
                    </form>
                    @endif

                    <!-- Bouton Commenter -->
                    {{-- <button class="btn btn-outline-secondary"><i class="fas fa-comment"></i> Commenter ({{$post->likes}})</button> --}}

                    <!-- Bouton Partager -->
                    {{-- <button class="btn btn-outline-success"><i class="fas fa-share"></i> Partager ({{$post->likes}})</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@include('dashbord')
@endsection
