@if ($posts->isEmpty())
    <div class="col-sm-12">
        <div id="post-modal-data" class="card card-block card-stretch card-height">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title"> <a href="{{ route('posts.create') }}"> Create Post <i
                                class="ri-add-line"></i></a></h4>
                </div>
            </div>
        </div>
        <div class="alert alert-solid alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#exclamation-triangle-fill"></use>
            </svg>
            <div>
                Aucun post n'est disponible pour le moment. La base de données est vide.
            </div>
        </div>
    </div>
@else
    @foreach ($posts as $post)
        <div class="col-sm-12">
            <div class="card card-block card-stretch">
                <div class="card-body">
                    <div class="user-post-data">
                        <div class="d-flex justify-content-between">
                            <div class="me-3">
                                <img class="rounded-circle img-fluid"
                                    src="{{ asset('maserAdminer/assets/images/user/03.jpg') }}" alt="">
                            </div>
                            <div class="w-100">
                                <div class="d-flex  justify-content-between">
                                    <div class="">
                                        <h5 class="mb-0 d-inline-block">{{ $post->user->name }}</h5>
                                        <span class="mb-0 d-inline-block">{{ $post->iSet }}</span>
                                        <p class="mb-0 text-primary">{{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="card-post-toolbar">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle" id="postdata-5" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false" role="button">
                                                <i class="ri-more-fill"></i>
                                            </span>
                                            <div class="dropdown-menu m-0 p-0" aria-labelledby="postdata-5">
                                                <a class="dropdown-item p-3" href="#">
                                                    <div class="d-flex align-items-top">
                                                        <i class="ri-save-line h4"></i>
                                                        <div class="data ms-2">
                                                            <h6>Save Post</h6>
                                                            <p class="mb-0">Add this to your saved items
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item p-3" href="#">
                                                    <div class="d-flex align-items-top">
                                                        <i class="ri-close-circle-line h4"></i>
                                                        <div class="data ms-2">
                                                            <h6> Post</h6>
                                                            <p class="mb-0">See fewer posts like this.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item p-3" href="#">
                                                    <div class="d-flex align-items-top">
                                                        <i class="ri-user-unfollow-line h4"></i>
                                                        <div class="data ms-2">
                                                            <h6>Unfollow User</h6>
                                                            <p class="mb-0">Stop seeing posts but stay
                                                                friends.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item p-3" href="#">
                                                    <div class="d-flex align-items-top">
                                                        <i class="ri-notification-line h4"></i>
                                                        <div class="data ms-2">
                                                            <h6>Notifications</h6>
                                                            <p class="mb-0">Turn on notifications for
                                                                this post</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p>
                            {{ $post->content }}
                        </p>
                    </div>
                    <div class="user-post">
                        <img src="{{ asset('storage/post/' . $post->image) }}" alt="post-image"
                            class="img-fluid rounded w-100">
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <!-- Bouton Like -->
                        <form action="{{ route('posts.like', ['post' => $post->id]) }}" method="post" id="forms">
                            @csrf
                            <input id="post-id" type="hidden" value="{{ $post->id }}">
                            <button class="like-btn btn btn-outline-primary" id="btnS" onclick="likingPost()"><i
                                    id="icon" class="ri-thumb-up-line"></i> <span class="like-count"
                                    id="count">{{ $post->likes->count() }}</span></button>

                        </form>
                        {{-- <span class="like-count">0</span> --}}
                        {{-- {{ $post->likes_count }} --}}
                        <!-- Bouton Commenter -->
                        <button class="btn btn-outline-secondary"><i class="fas fa-comment"></i>
                            Commenter</button>

                        <!-- Bouton Partager -->
                        <button class="btn btn-outline-success" onclick="javascript:void();"><i class="fas fa-share"></i> Partager
                        </button>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endif

{{-- <div class="post">
    <p>Contenu du post...</p>
    <button class="like-btn" data-post-id="{{ $post->id }}" data-liked="{{ $post->isLikedBy(auth()->user()) ? 'true' : 'false' }}">
        {{ $post->isLikedBy(auth()->user()) ? 'Unlike' : 'Like' }}
    </button>
    <span class="likes-count">{{ $post->likes()->count() }} likes</span>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const likeBtns = document.querySelectorAll('.like-btn');

    likeBtns.forEach(btn => {
        btn.addEventListener('click', async function() {
            const postId = this.dataset.postId;
            const isLiked = this.dataset.liked === 'true';

            try {
                const response = await fetch(`/posts/${postId}/like`, {
                    method: isLiked ? 'DELETE' : 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                });

                if (!response.ok) {
                    throw new Error('Erreur lors de la requête');
                }

                const data = await response.json();
                this.dataset.liked = data.liked ? 'true' : 'false';
                this.textContent = data.liked ? 'Unlike' : 'Like';
                document.querySelector(`.likes-count[data-post-id="${postId}"]`).textContent = `${data.likesCount} likes`;
            } catch (error) {
                console.error('Erreur :', error.message);
            }
        });
    });
});

</script> --}}
