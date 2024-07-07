@if ($posts->isEmpty())
    <div class="alert alert-solid alert-warning d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24">
            <use xlink:href="#exclamation-triangle-fill"></use>
        </svg>
        <div>
            Aucun post n'est disponible pour le moment. La base de données est vide.
        </div>
    </div>
@else
    @foreach ($posts as $post)
        <div class="card">
            <div class="card-body">
                <div class="post-item">
                    <div class="user-post-data pb-3">
                        <div class="d-flex justify-content-between">
                            <div class="me-3">
                                <img class="rounded-circle  avatar-60" src="../assets/images/user/1.jpg" alt="">
                            </div>
                            <div class="w-100">
                                <div class="d-flex justify-content-between flex-wrap">
                                    <div class="">
                                        <h5 class="mb-0 d-inline-block"><a href="#"
                                                class="">{{ $post->user->name }}</a>
                                        </h5>
                                        <p class="ms-1 mb-0 d-inline-block">{{ $post->iSet }}</p>
                                        <p class="mb-0">{{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="card-post-toolbar">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" role="button">
                                                <i class="ri-more-fill"></i>
                                            </span>
                                            <div class="dropdown-menu m-0 p-0" style="">
                                                <a class="dropdown-item p-3" href="#">
                                                    <div class="d-flex align-items-top">
                                                        <i class="ri-save-line h4"></i>
                                                        <div class="data ms-2">
                                                            <h6>Save Post</h6>
                                                            <p class="mb-0">Add
                                                                this to your saved
                                                                items</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item p-3"
                                                    href="{{ route('posts.edit', ['post' => $post->id]) }}">
                                                    <div class="d-flex align-items-top">
                                                        <i class="ri-pencil-line h4"></i>
                                                        <div class="data ms-2">
                                                            <h6>Edit Post</h6>
                                                            <p class="mb-0">
                                                                Update your post and
                                                                saved items</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item p-3" href="#">
                                                    <div class="d-flex align-items-top">
                                                        <i class="ri-close-circle-line h4"></i>
                                                        <div class="data ms-2">
                                                            <h6>Hide From Timeline
                                                            </h6>
                                                            <p class="mb-0">See
                                                                fewer posts like
                                                                this.</p>
                                                        </div>
                                                    </div>
                                                </a>
                                                {{-- <a class="dropdown-item p-3" href="#">
                                                <div class="d-flex align-items-top">
                                                    <i class="ri-delete-bin-7-line h4"></i>
                                                    <div class="data ms-2">
                                                        <h6>Delete</h6>
                                                        <p class="mb-0">
                                                            Remove thids Post on
                                                            Timeline</p>
                                                    </div>
                                                </div>
                                            </a> --}}
                                                <a class="dropdown-item p-3" href="" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    <div class="d-flex align-items-top">
                                                        <i class="ri-close-circle-line h4"></i>
                                                        <div class="data ms-2">
                                                            <h6>Delete</h6>
                                                            <p class="mb-0">Remove thids Post on
                                                                Timeline
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item p-3" href="#">
                                                    <div class="d-flex align-items-top">
                                                        <i class="ri-notification-line h4"></i>
                                                        <div class="data ms-2">
                                                            <h6>Notifications</h6>
                                                            <p class="mb-0">Turn
                                                                on notifications for
                                                                this post</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true"
                                                    style="display: none;">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Suppression</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close">

                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Confimer la suppression du post
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Annuler</button>

                                                                <form
                                                                    action="{{ route('posts.destroy', ['post' => $post->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                        <!-- Bouton Commenter -->
                        <button class="btn btn-outline-secondary"><i class="fas fa-comment"></i>
                            Commenter</button>
        
                        <!-- Bouton Partager -->
                        <button class="btn btn-outline-success"><i class="fas fa-share"></i> Partager
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
