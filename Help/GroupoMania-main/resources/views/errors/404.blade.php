@extends('adminer.dashboard.layouts')

@section('title')
    Page 404
@endsection

@section('content')
    
      <div class="wrapper">
       <div class="container p-0">
            <div class="row no-gutters height-self-center">
               <div class="col-sm-12 text-center align-self-center">
                  <div class="iq-error position-relative mt-5">
                        <img src="{{asset('masterAdminer/assets/images/error/400.png')}}" class="img-fluid iq-error-img" alt="">
                        <h2 class="mb-0 text-center">Oops! This Page is Not Found.</h2>
                        <p class="text-center">The requested page dose not exist.</p>
                        <a class="btn btn-primary mt-3" href="{{route('racine')}}"><i class="ri-home-4-line"></i>Back to Home</a>                            
                  </div>
               </div>
            </div>
      </div>
      </div>

@endsection