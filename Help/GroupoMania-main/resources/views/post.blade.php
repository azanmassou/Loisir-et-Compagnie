@if ($posts->isEmpty())
    <div class="alert alert-warning d-flex align-items-center w-50 mx-auto my-auto" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
            <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div>
            Aucun post disponible dans la base de donnee
        </div>
    </div>
@else
    @foreach ($posts as $post)
        <div class="container">
            <!-- Header du Post -->
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="url_de_votre_avatar.jpg" alt="Avatar" class="rounded-circle me-3 profile-image">
                        <div class="d-block mt-2">
                            <h5 class="mb-0">{{ $post->user->name }}</h5>
                            <small class="text-muted text-end mx-3">{{ $post->created_at }}</small>
                        </div>
                    </div>
                </div>

                <!-- Image du Post -->
                <img src="{{ asset('storage/post/' . $post->image) }}" style="max-height: 500px;"
                    class="card-img-top p-4" alt="Image du Post">

                <!-- Contenu du Post -->
                <div class="card-body">
                    <!-- Titre du Post -->
                    <h5 class="card-title">{{ $post->title }}</h5>

                    <!-- Texte du Post -->
                    <p class="card-text">{{ $post->content }}</p>

                    <!-- Boutons de Like, Commenter, Partager -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <!-- Bouton Like -->
                        {{-- <form id="likeForm_{{ $post->id }}" action="{{ route('posts.like', $post->id) }}"
                            method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary" id="likeBtn_{{ $post->id }}">
                                <i class="fas fa-thumbs-up"></i> Like ({{ $post->likes }})
                            </button>
                        </form> --}}
                        
                            @if ($post->isLikedBy(auth()->user()))
                                <form action="{{ route('posts.unlike', $post->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Unlike</button>
                                </form>
                            @else
                                <form action="{{ route('posts.like', $post->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Like</button>
                                </form>
                            @endif

                            <span>{{ $post->likes_count }} likes</span>
                        


                        <!-- Bouton Commenter -->
                        {{-- <button class="btn btn-outline-secondary"><i class="fas fa-comment"></i> Commenter ({{ $post->likes }})</button> --}}

                        <!-- Bouton Partager -->
                        {{-- <button class="btn btn-outline-success"><i class="fas fa-share"></i> Partager ({{ $post->likes }})</button> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
