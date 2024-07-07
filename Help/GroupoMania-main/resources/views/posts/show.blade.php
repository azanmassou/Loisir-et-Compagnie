@extends('layout')

@section('title')
    Voir le Post
@endsection

@section('content')
    <div class="container">
        <!-- Header du Post -->

        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <img src="url_de_votre_avatar.jpg" alt="Avatar" class="rounded-circle me-3" style="width: 40px;">
                    <h5 class="mb-0">{{ $post->user->name }}</h5>
                </div>
                <small class="text-muted text-end">{{ $post->created_at }}</small>
            </div>

            <!-- Image du Post -->

            {{-- @dd(asset('storage/post' . $post->image)) --}}
            <img src="{{ asset('storage/post/' . $post->image) }}" class="card-img-top" alt="Image du Post">

            <!-- Contenu du Post -->
            <div class="card-body">
                <!-- Titre du Post -->
                <h5 class="card-title">{{ $post->title }}</h5>

                <!-- Texte du Post -->
                <p class="card-text">{{ $post->content }}</p>

                <!-- Boutons de Like, Commenter, Partager -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <!-- Bouton Like -->
                    <form action="{{ route('posts.like', $post->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary"><i class="fas fa-thumbs-up"></i>
                            Like ({{ $post->likes }})</button>
                    </form>

                    <!-- Bouton Commenter -->
                    {{-- <button class="btn btn-outline-secondary"><i class="fas fa-comment"></i> Commenter ({{$post->likes}})</button> --}}

                    <!-- Bouton Partager -->
                    {{-- <button class="btn btn-outline-success"><i class="fas fa-share"></i> Partager ({{$post->likes}})</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
