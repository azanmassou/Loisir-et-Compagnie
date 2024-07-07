@extends('adminer.dashboard.layouts')


@section('title')
    Operation Successfully
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
                            <img src="../assets/images/login/mail.png" width="80"  alt="">
                            <h1 class="mt-3 mb-0">Success !</h1>
                            <p>L'operatin s'est deroule avec success  ... Veillez vous connecter </p>
                            <div class="d-inline-block w-100">
                                <a href="{{route('auth.login')}}" class="btn btn-primary mt-3">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      </div>
    
@endsection
