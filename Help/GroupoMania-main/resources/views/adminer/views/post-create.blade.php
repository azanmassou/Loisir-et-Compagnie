@extends('adminer.dashboard.layouts')

@section('title')
    Post Create
@endsection

{{-- @section('links')
    {{ $posts->links()}}
@endsection --}}

@section('contents')
    <div class="col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Creer un Post</h4>
                </div>
            </div>
            <div class="card-body">
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis mollis, diam
                    nibh finibus leo</p> --}}
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            id="title" value="{{ old('title') }}" placeholder="Enter Name">
                        <div id="title" class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="content">Contenu</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3"></textarea>
                        <div id="content" class="invalid-feedback">
                            {{ $errors->first('content') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label custom-file-input">Choose file</label>
                        <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image">
                        <div id="image" class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    </div>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn bg-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('content')
    @include('adminer.dashboard.dashboard')
@endsection
