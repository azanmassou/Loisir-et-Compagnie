@extends('adminer.dashboard.layouts')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="wrapper">
        <section class="sign-in-page">
            <div id="container-inside">
                <div id="circle-small"></div>
                <div id="circle-medium"></div>
                <div id="circle-large"></div>
                <div id="circle-xlarge"></div>
                <div id="circle-xxlarge"></div>
            </div>
            <div class="container p-0">
                <div class="row no-gutters">
                    @include('auth.partials.slider')
                    <div class="col-md-6 bg-white pt-5 pt-5 pb-lg-0 pb-5">
                        <div class="sign-in-from">
                            <h1 class="mb-0">Reset Password</h1>
                            <p>Enter your email address and we'll send you an email with instructions to reset your
                                password.</p>
                            <form class="mt-4" action="{{route('auth.reset')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label" for="email">Email address</label>
                                    <input type="email" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" id="email"
                                        placeholder="Enter email">
                                        <div id="email" class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                </div>
                                <div class="d-inline-block w-100">
                                    <button type="submit" class="btn btn-primary float-right">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
