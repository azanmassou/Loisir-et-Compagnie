@extends('adminer.dashboard.layouts')


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
                        <h1 class="mb-0">Confimation Password</h1>
                        {{-- <p>Enter your email address and password to access admin panel.</p> --}}
                        <form class="mt-4" action="{{ route('auth.confirm') }}" method="POST">
                            @csrf
                            {{-- <div class="form-group">
                                <label class="form-label" for="email">Email address</label>
                                <input type="email" class="form-control mb-0 @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                    placeholder="Enter email" name="email">
                                    <div id="email" class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                            </div> --}}
                            <div class="form-group">
                                <label class="form-label" for="password">Password</label>
                                {{-- <a href="{{route('auth.reset')}}" class="float-end">Forgot password?</a> --}}
                                <input type="password" class="form-control mb-0 @error('password') is-invalid @enderror" id="password"
                                     name="password">
                                    <div id="password" class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="passwords">Passwords</label>
                                {{-- <a href="{{route('auth.reset')}}" class="float-end">Forgot password?</a> --}}
                                <input type="password" class="form-control mb-0 @error('passwords') is-invalid @enderror" id="passwords"
                                     name="passwords">
                                    <div id="passwords" class="invalid-feedback">
                                        {{ $errors->first('passwords') }}
                                    </div>
                            </div>
                            <div class="form-group">
                                {{-- <label class="form-label" for="passwords">Passwords</label>
                                <a href="{{route('auth.reset')}}" class="float-end">Forgot password?</a> --}}
                                <input type="hidden" class="form-control mb-0 @error('userEmail') is-invalid @enderror" id="userEmail"
                                     name="userEmail" value="{{ $user->email}}">
                                    <div id="userEmail" class="invalid-feedback">
                                        {{ $errors->first('userEmail') }}
                                    </div>
                            </div>
                            <div class="d-inline-block w-100">
                                {{-- <div class="form-check d-inline-block mt-2 pt-1">
                                    <input type="checkbox" class="form-check-input" id="rememberCheckbox" name="rememberCheckbox">
                                    <label class="form-check-label" for="rememberCheckbox">Remember Me</label>
                                </div> --}}
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            {{-- <div class="sign-info">
                                <span class="dark-color d-inline-block line-height-2">Don't have an account? <a
                                        href="{{route('auth.register')}}">Sign up</a></span>
                                <ul class="iq-social-media">
                                    <li><a href="#"><i class="ri-facebook-box-line"></i></a></li>
                                    <li><a href="#"><i class="ri-twitter-line"></i></a></li>
                                    <li><a href="#"><i class="ri-instagram-line"></i></a></li>
                                </ul>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
