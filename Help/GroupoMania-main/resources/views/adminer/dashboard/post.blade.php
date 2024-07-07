<div class="col-sm-12">
    <div class="card card-block card-stretch">
        <div class="card-body">
            <div class="user-post-data">
                <div class="d-flex justify-content-between">
                    <div class="me-3">
                        <img class="rounded-circle img-fluid" src="../assets/images/user/03.jpg" alt="">
                    </div>
                    <div class="w-100">
                        <div class="d-flex  justify-content-between">
                            <div class="">
                                <h5 class="mb-0 d-inline-block">{{ $post->user->name }}</h5>
                                <span class="mb-0 d-inline-block">{{$post->iSEt}}</span>
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
                                        {{-- <a class="dropdown-item p-3" href="">
                                            <div class="d-flex align-items-top">
                                                <i class="ri-close-circle-line h4"></i>
                                                <div class="data ms-2">
                                                    <h6>Hide Post</h6>
                                                    <p class="mb-0">See fewer posts like this.
                                                    </p>
                                                </div>
                                            </div>
                                        </a> --}}
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
                                        <a class="dropdown-item p-3"
                                            href="{{ route('posts.edit', ['post' => $post->id]) }}">
                                            <div class="d-flex align-items-top">
                                                <i class="ri-notification-line h4"></i>
                                                <div class="data ms-2">
                                                    <h6>Editer</h6>
                                                    <p class="mb-0">Updating
                                                        this post</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item p-3" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <div class="d-flex align-items-top">
                                                <i class="ri-close-circle-line h4"></i>
                                                <div class="data ms-2">
                                                    <h6>Deleting</h6>
                                                    <p class="mb-0">Delete this post
                                                    </p>
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

                <img src="{{ asset('storage/post/' . $post->image) }}" alt="post-image" class="img-fluid rounded w-100">
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

<div class="card-body">   
    <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
         style="display: none;">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                     </button>
                 </div>
                 <div class="modal-body">
                    Confimer la suppression du post 
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                     <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                         <button type="button" class="btn btn-primary">Save changes</button>
                     </form>

                 </div>
             </div>
         </div>
     </div>
 </div>