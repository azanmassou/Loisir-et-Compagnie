@extends('adminer.dashboard.layouts')

@section('title')
    Login
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
                        {{-- <h1 class="mb-0">Sign in</h1>
                        <p>Enter your email address and password to access admin panel.</p> --}}
                        <form class="mt-4" action="{{ route('auth.login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" class="form-control mb-0 @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                    placeholder="Enter email" name="email">
                                    <div id="email" class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="password">Password</label>
                                <a href="{{route('auth.reset')}}" class="float-end">Forgot password?</a>
                                <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror" id="password"
                                     name="password">
                                    <div id="password" class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                            </div>
                            <div class="d-inline-block w-100">
                                <div class="form-check d-inline-block mt-2 pt-1">
                                    <input type="checkbox" class="form-check-input" id="rememberCheckbox" name="rememberCheckbox">
                                    <label class="form-check-label" for="rememberCheckbox">Remember Me</label>
                                </div>
                                <button type="submit" class="btn btn-primary float-end">Sign in</button>
                            </div>
                            <div class="sign-info">
                                <span class="dark-color d-inline-block line-height-2">Don't have an account? <a
                                        href="{{route('auth.register')}}">Sign up</a></span>
                                <ul class="iq-social-media">
                                    <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                    <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                    <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
