<div class="row">
    <div class="col-lg-8">
        <div class="alert alert-warning d-flex align-items-center w-50 mx-auto my-auto" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
               @yield('empty')
            </div>

        </div>
    </div>
    <div class="col-lg-2 offset-2 text-end">
        <a href="{{ route('posts.create') }} " class="btn btn-primary">Ajouter un post</a>
    </div>
</div>
